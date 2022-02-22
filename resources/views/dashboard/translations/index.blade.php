@extends('dashboard.templates.master')
@section("main")

{{-- Main list start --}}
<section class="list">

    {{-- Multiple Items form start --}}
    <form id="multiple_items_form">
        @foreach ($locales as $locale)
        {{-- List Item start --}}
        <div class="list__item">

            <div class="list__item-div width-100">{{$locale->name}}</div>

            {{-- Item Controls start --}}
            <div class="list__item-controls">
                <a class="control-button" href="{{route('dashboard.translations.single', $locale->value)}}" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" title="Редактировать"><span class="material-icons">edit</span></a>
            </div> {{-- Item Controls start --}}
        </div> {{-- List Item start --}}
        @endforeach
    </form> {{-- Multiple Items form end --}}

</section> {{-- Main list end --}}


@endsection