<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::orderBy("ruTitle", "asc")->get();
        $page_title = __('Вакансии');

        return view("vacancies.index", compact("vacancies", "page_title"));
    }

    public function single($url)
    {   
        $vacancy = Vacancy::where("url", $url)->first();

        return view("vacancies.single", compact("vacancy"));
    }

    public function dashboard_index(Request $request)
    {
        // Generate parameters for order request
        $order_by = $request->order_by;
        if (!$order_by) $order_by = "created_at";

        $order_type = $request->order_type;
        if (!$order_type) $order_type = "desc";

        $active_page = $request->page;
        if (!$active_page) $active_page = 1;

        $vacancies = Vacancy::orderBy($order_by, $order_type)
            ->paginate(30, ["*"], "page", $active_page)
            ->appends($request->except("page"));

        //used in search & counting
        $all_items = Vacancy::orderBy("ruTitle", "asc")->get();
        $items_count = count($all_items);

        return view("dashboard.vacancies.index", compact("vacancies", "all_items", "items_count", "order_by", "order_type", "active_page"));
    }

    public function dashboard_create()
    {
        return view("dashboard.vacancies.create");
    }

    public function store(Request $request)
    {
        // Validate uique fields
        $validation_errors = [];
        if(!$request->file('image') && !$request->image_from_archive)
            array_push($validation_errors, "Изображение не выбрано. Выберите изображение из архива или добавьте новый!");

        if (count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $validation_rules = [
            "ruTitle" => "unique:vacancies"
        ];

        $validation_messages = [
            "ruTitle.unique" => "Вакансия с таким заголовком уже существует !",
        ];

        Validator::make($request->all(), $validation_rules, $validation_messages)->validate();

        $vacancy = new Vacancy();
        $multiLanguageFields = ['Title', 'Body'];
        Helper::fillMultiLanguageFields($request, $vacancy, $multiLanguageFields);

        $vacancy->url = Helper::transliterate_into_latin($request->ruTitle);
        $vacancy->image = $request->image_from_archive ? $request->image_from_archive : "error"; 
        $vacancy->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $vacancy->image = $filename;
            $vacancy->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->route("dashboard.vacancies.index");
    }

    public function dashboard_single($id)
    {
        $vacancy = Vacancy::find($id);

        return view("dashboard.vacancies.single", compact("vacancy"));
    }

    public function update(Request $request)
    {
        $vacancy = Vacancy::find($request->id);
        // Validate uique filends
        $validation_errors = [];
        if($request->ruTitle != $vacancy->ruTitle) {
            $duplicate = Vacancy::where("ruTitle", $request->ruTitle)->first();
            if ($duplicate) array_push($validation_errors, "Вакансия с таким заголовком уже существует!");
        }

        if(count($validation_errors) > 0) return back()->withInput()->withErrors($validation_errors);

        $multiLanguageFields = ['Title', 'Body'];
        Helper::fillMultiLanguageFields($request, $vacancy, $multiLanguageFields);

        $vacancy->url = Helper::transliterate_into_latin($request->ruTitle);
        $vacancy->image = $request->image_from_archive ? $request->image_from_archive : $vacancy->image; 
        $vacancy->save();

        //resize image and store in archive
        if($request->file("image")) {
            $image = $request->file("image");
            $filename = Helper::rename_file_if_exists("img/archive/", $image);
            $vacancy->image = $filename;
            $vacancy->save();
            Helper::store_image_into_archive($image, $filename);
        }

        return redirect()->back();
    }

    public function remove(Request $request)
    {
        // need to get in array because of foreach multiple delete
        $ids = [$request->id];
        $this->permanent_delete($ids);

        return redirect()->route("dashboard.vacancies.index");
    }

    public function remove_multiple(Request $request)
    {
        $this->permanent_delete($request->ids);

        return redirect()->back();
    }

    private function permanent_delete($ids)
    {
        foreach ($ids as $id) {
            $vacancy = Vacancy::find($id);
            $vacancy->delete();
        }
    }

}
