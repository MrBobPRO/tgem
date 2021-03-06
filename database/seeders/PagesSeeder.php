<?php

namespace Database\Seeders;

use App\Models\Dropdown;
use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //----------Dropdowns start----------
        $ruTitle = ["Главная", "О Компании", "Деятельность", "Проекты", "Медиа", "Карьера", "Контакты"];
        $enTitle = ["Main", "About", "Activity", "Projects", "Media", "Career", "Contacts"];
        $url = ["/", "about", "activity", "projects", "media", "career", "contacts"];
        $priority = [1,2,3,4,5,6,7];
        $may_have_childs = [false, true, true, true, true, true, true];

        for ($i = 0; $i < count($ruTitle); $i++) {
            $dropdown = new Dropdown();
            $dropdown->ruTitle = $ruTitle[$i];
            $dropdown->tjTitle = $ruTitle[$i];
            $dropdown->enTitle = $enTitle[$i];
            $dropdown->url = $url[$i];
            $dropdown->priority = $priority[$i];
            $dropdown->may_have_childs = $may_have_childs[$i];
            $dropdown->save();
        }
        //----------Dropdowns end----------



        //----------Pages start----------
        // About Dropdowns pages
        $title = ["О Нас", "История", "Корпоративная культура", "Социальная ответственность", "Сертификаты"];
        $dropdown_id = [2,2,2,2,2];
        $priority = [1,2,3,4,5];
        $default_template = [true,true,true,true,true];
        $url = ["about_us", "our_history", "corporate_culture", "social_responsibility", "certificates"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Activity Dropdowns pages
        $title = ["Строительство", "Энергетика"];
        $dropdown_id = [3,3];
        $priority = [1,2];
        $default_template = [true,true];
        $url = ["construction", "energy"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Projects Dropdowns pages
        $title = ["Выполненные проекты", "Текущие проекты"];
        $dropdown_id = [4,4];
        $priority = [1,2];
        $default_template = [false,false];
        $url = ["completed_projects", "current_projects"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Media Dropdowns pages
        $title = ["Новости компании", "Отраслевые новости", "Галерея"];
        $dropdown_id = [5,5,5];
        $priority = [1,2,3];
        $default_template = [false,false,false];
        $url = ["company_news", "industry_news", "gallery"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Career Dropdowns pages
        $title = ["Карьера в ТГЭМ", "Вакансии"];
        $dropdown_id = [6,6];
        $priority = [1,2];
        $default_template = [true,false];
        $url = ["career_in_tgem", "vacancies"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }

        // Contacts Dropdowns pages
        $title = ["Контакты", "Онлайн запись"];
        $dropdown_id = [7,7];
        $priority = [1,2];
        $default_template = [false,false];
        $url = ["our_contacts", "online_booking"];

        for ($i = 0; $i < count($title); $i++) {
            $page = new Page();
            $page->ruTitle = $title[$i];
            $page->enTitle = $title[$i];
            $page->tjTitle = $title[$i];
            $page->dropdown_id = $dropdown_id[$i];
            $page->priority = $priority[$i];
            $page->default_template = $default_template[$i];
            $page->url = $url[$i];
            $page->save();
        }
        //----------Pages end----------


        //--------------------Pages Text start--------------------
        $page = Page::where("ruTitle", "О Нас")->first();
        $page->image = "about.jpg";
        $page->ruMainText = "<h1>Строительство<br /> И Гидроэнергетика</h1>
        <p>ТГЭМ – ведущая компания по строительству гидроэнергетических и инфраструктурных объектов.</p>
        <p>За более чем полувековую историю своего существования наша компания выполнила и продолжает выполнять строительные, электромонтажные и пусконаладочные работы на большинстве крупных объектах Республики Таджикистан и за ее пределами.</p>
        <p>В процессе своей профессиональной деятельности мы придаем большое значение инновациям и внимательно следим за появлением новых технологий, материалов и оборудования, которые могут повысить эффективность реализации проектов, в первую очередь, для заказчика и надежности работы. Мы всегда рады сотрудничеству с новыми партнерами и стараемся использовать наиболее продуктивные способы для достижения общих целей.</p>";
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->save();


        $page = Page::where("ruTitle", "История")->first();
        $page->image = "history.jpg";
        $page->ruMainText = "<p>Таджикское монтажное управление &laquo;Гидроэлектромонтаж&raquo; (ТМУ ГЭМ) было образовано в Душанбе в 1959 году и входило в состав Всесоюзного треста города Ленинграда (ныне Санкт-Петербург).</p>
        <ul>
        <li>В 60-х годах ТМУ ГЭМ были доверены электромонтажные работы на Яванской ТЭЦ. Специалистами управления был выполнен монтаж трансформаторов на ОРУ 220 кВ, а также монтаж энергоблока машинного зала.</li>
        <li>В 1972 был запущен цех по обработке металла и изготовлению металлоконструкции.</li>
        <li>С 1972 по 1979 года были выполнены все электромонтажные работы и введены в эксплуатацию гидроагрегаты Нурекской ГЭС. Монтаж электрической части был выполнен специалистами ТМУ ГЭМ в рекордно короткий срок.</li>
        <li>В вначале 80-ых годов ТМУ ГЭМ обеспечил установку высоковольтного оборудования в кремниево-преобразовательных подстанциях, а также сданы в эксплуатацию электролизные корпуса Алюминиевого завода.</li>
        <li>В 1986 году ТМУ ГЭМ начала работу на Рогунской ГЭС.</li>
        </ul>";
        $page->ruAdditionalTextTitle = 'ОСНОВНЫЕ ВЕХИ НОВЕЙШЕЙ ИСТОРИИ ТГЭМ';
        $page->ruAdditionalTextBody = '<p><strong>2006</strong> &ndash; Компания выиграла свой первый международный тендер: Реабилитация ГЭС &laquo;Перепадная&raquo;</p>
        <p><strong>2009</strong> &ndash; Компания впервые в новейшей истории произвела строительство подстанции: ПС Бустон 220/110/10 кВ</p>
        <p><strong>2010</strong> &ndash; Компания открыла завод по производству бетона, железобетонных опор и бетонных изделий для энергетической отрасли в г. Душанбе</p>
        <p><strong>2010</strong> &ndash; Компания запустила бетоносмесительный завод на Рогунской ГЭС</p>
        <p><strong>2011</strong> &ndash; Компания впервые начала разработку карьеров на Рогунской ГЭС</p>
        <p><strong>2011</strong> &ndash; Компания запустила дробильно-сортировочный завод на Рогунской ГЭС</p>
        <p><strong>2012</strong> &ndash; Компания впервые выиграла международный тендер за пределами страны, в ИР Афганистан</p>
        <p><strong>2014</strong> &ndash; Компания совместно с партнёром участвовала в реабилитации ОРУ 500/220 кВ Нурекской ГЭС</p>
        <p><strong>2015</strong> &ndash; Компания впервые в новейшей истории смонтировала кабели 500/220 кВ</p>
        <p><strong>2016</strong> &ndash; Компания реализовала проект по установке оборудования диспетчерского контроля и сбора данных SCADA</p>
        <p><strong>2016</strong> &ndash; Компания выиграла тендер по перекрытию реки Вахш в рамках проекта по строительству Рогунской ГЭС</p>
        <p><strong>2017</strong> &ndash; Компания получила сертификат соответствия системы менеджмента качества ISO 9001:2008</p>
        <p><strong>2017</strong> &ndash; Компания завершила насыпь плотины Рогунской ГЭС до отметки 1050</p>
        <p><strong>2017</strong> &ndash; Компания впервые произвела монтаж КРУЭ 500/220 кВ</p>
        <p><strong>2017</strong> &ndash; Компания выполнила армировку и бетонирование строительных тоннелей СТ 1, СТ 2 Рогунской ГЭС</p>
        <p><strong>2017</strong> &ndash; Компания реализовала проект по АСКУЭ в городе Худжанд</p>
        <p><strong>2018</strong> &ndash; Компания впервые в новейшей истории произвела монтаж токопроводов генераторного напряжения</p>
        <p><strong>2018</strong> &ndash; Компания впервые в своей истории произвела проходку тоннеля</p>
        <p><strong>2018</strong> &ndash; 16 ноября состоялся торжественный запуск 6-ого агрегата Рогунской ГЭС при непосредственном участии специалистов нашей компании</p>
        <p><strong>2019</strong> &ndash; Компания получила сертификаты соответствия системы менеджмента качества OHSAS 18001:2015 и ISO 14001:2015</p>
        <p><strong>2019</strong> &ndash; Компания впервые в своей истории реализовала проект по строительству автодороги</p>
        <p><strong>2019</strong> &ndash; Компания подписала контракт по проекту &laquo;Реабилитация Кайраккумской ГЭС&raquo;</p>
        <p><strong>2019</strong> &ndash; Компания подписала контракт на строительство Линии электропередачи 500 кВ в рамках проекта &laquo;CASA-1000&raquo;</p>
        <p><strong>2019</strong> &ndash; 9 сентября специалисты компании участвовали в торжественном запуске 5-ого агрегата Рогунской ГЭС</p>
        <p><strong>2020</strong> &ndash; Компания начала строительство завода по производству электрического оборудования.</p>
        <p><strong>2020</strong> &ndash; Компания подписала контракт на строительство конверторной подстанции, в рамках проекта &laquo;CASA-1000&raquo;</p>
        <p><strong>2020</strong> &ndash; Компания выиграла тендер по проекту &laquo;Реабилитация Нурекской ГЭС&raquo;</p>
        <p><strong>2020</strong> &ndash; Компания выиграла тендер по проекту &laquo;Управление водными ресурсами в бассейне реки Пяндж&raquo;</p>
        <p><strong>2021</strong> &ndash; Компания подписала контракт на проектирование, поставку и монтаж электрооборудования в рамках &laquo;Проекта по пере-подключению к энергетической системе Центральной Азии&raquo;.</p>
        <p><strong>2021</strong> &ndash; Компания выиграла тендер на строительство правобережных сооружений (Лот 3), в рамках проекта по строительству Рогунской ГЭС</p>';
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();



        $page = Page::where("ruTitle", "Корпоративная культура")->first();
        $page->image = "culture.jpg";
        $page->ruMainText = "<p>Мы считаем, что лучшая работа &ndash; та, которая приносит удовольствие, именно поэтому мы постоянно развиваем и укрепляем нашу корпоративную культуру.</p>
        <p>Здоровая корпоративная культура помогает нам постоянно повышать эффективность работы всей компании: принадлежность к общему делу влияет на чувство самоценности каждого сотрудника. Положительный рабочий опыт улучшает общение и повышает степень взаимодействия внутри команды. Это позволяет повышать производительность и уровень вовлеченности сотрудников, улучшать финансовые показатели и повышать степень удовлетворенности клиентов. Наши ценности определяют, кто мы, к чему мы стремимся и как мы ведем себя по отношению друг к другу. Мы считаем, что наша приверженность принципам позитивной корпоративной культуры является основой сильной компании.</p>";
        $page->ruAdditionalTextTitle = '';
        $page->ruAdditionalTextBody = '
        <h3 style="margin-bottom: 0">Наше видение:</h3>
        <p>Быть инновационной, лидирующей компанией во всех областях деятельности, признанной за высокое качество.</p>
        <h3 style="margin-bottom: 0">Наша миссия:</h3>
        <p>Мы стремимся повышать качество жизни людей и создавать условия для экономического развития тех регионов, где мы функционируем. Это достигается путем строительства инфраструктурных объектов с соблюдением современных технических требований и мировых стандартов.</p>
        <h3 style="margin-bottom: 0">Наши ценности:</h3>
        <ul style="margin-bottom: 10px">
        <li><strong>Ответственность</strong></li>
        </ul>
        <p>Ответственность &mdash; это одно из главных качеств каждого нашего сотрудника, без которого невозможно сохранить надежность и доверие. Ответственность неразрывно связана с готовностью каждого в случае необходимости взять принятие решений на себя и отвечать за свои поступки.</p>
        <ul style="margin-bottom: 10px">
        <li><strong>Профессионализм</strong></li>
        </ul>
        <p>Мастерство оттачивается годами, независимо от степени образования и имеющегося опыта. Мы ценим в наших сотрудниках стремление к саморазвитию с целью совершенствования своих профессиональных знаний и навыков, и создаем для этого все необходимые условия.</p>
        <ul style="margin-bottom: 10px">
        <li><strong>Качество</strong></li>
        </ul>
        <p>Качественная работа &ndash; залог успешности компании. Успешная компания &ndash; залог стабильной и высокооплачиваемой работы. Мы убеждены, что если каждый сотрудник добросовестно и качественно выполняет свою работу, то он добьется всестороннего роста и успеха.</p>
        <ul style="margin-bottom: 10px">
        <li><strong>Честность</strong></li>
        </ul>
        <p>В наши ценности безусловно входят бескомпромиссная порядочность, честность, справедливость, взаимоуважение, открытость, взаимовыручка и доверие.</p>
        <ul style="margin-bottom: 10px">
        <li><strong>Человечность</strong></li>
        </ul>
        <p>Все, что мы делаем, каждое решение, которое мы принимаем, учитывает благополучие каждого члена общества. Мы рассматриваем каждого нашего сотрудника как часть большой семьи, в которой сохраняются традиционные принципы человечности.</p>';
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();


        $page = Page::where("ruTitle", "Социальная Ответственность")->first();
        $page->image = "social.jpg";
        $page->ruMainText = "<p>ТГЭМ ежегодно поддерживает множество общественных проектов, оказывая помощь в развитии науки, образования и пропаганде здорового образа жизни.</p>
        <p><strong>Поддержка спорта</strong><br />Спорт &ndash; это здоровье и достижение нации. ТГЭМ поддерживает и начинания в спорте, и стремление к профессиональным спортивным успехам.</p>
        <p><strong>ТГЭМ</strong>&nbsp;является многолетним партнёром Федерации Футбола Таджикистана и одним из основных спонсоров Детско-Юношеской Футбольной Лиги Таджикистана.</p>
        <p>Ежегодно, под эгидой Детско-Юношеской Футбольной Лиги, проводятся соревнования где принимают участие более тысячи юношей со всего Таджикистана от 12 до 18 лет.</p>";
        $page->ruAdditionalTextTitle = '';
        $page->ruAdditionalTextBody = '<h3>Поддержка социально &ndash; незащищённых слоев населения</h3>
        <p>ТГЭМ регулярно оказывает благотворительную помощь нуждающимся:</p>
        <p>взрослым и детям с органическими возможностями здоровья, детям из малообеспеченных семей, детям сиротам.</p>
        <h3 style="margin-top: 30px">Поддержка образования</h3>
        <p><strong>ТГЭМ</strong> уделяет особое внимание образованию подрастающего поколения.</p>
        <p>В целях подготовки перспективного кадрового резерва и совершенствования профориентанционной работы между ВУЗ-ами страны и ТГЭМ подписаны меморандумы о сотрудничестве, благодаря чему у студентов появилась возможность проходить практику и стажировку на объектах нашей компании.</p>
        <p>Ежегодно в организациях высшего и среднего профессионального образования проводятся ряд мероприятий по отбору наиболее перспективных выпускников школ. В ВУЗ-ах страны проводятся тренинги и семинары, а наши специалисты имеют возможность присутствовать на выпускных экзаменах студентов, с целью выявления наиболее талантливых студентов для дальнейшего трудоустройстве в компанию.</p>
        <h3 style="margin-top: 30px">Социальные инициативы</h3>
        <ul>
        <li>В 2019 году компания построила и сдала в эксплуатацию среднюю общеобразовательную школу №6 в городе Душанбе. Строительство новой современной школы было завершено за 1.5 года. Общая площадь составляет 8700 м2.</li>
        <li>В 2020 году в рамках благотворительных инициатив компания дважды оказало помощь Управлению здравоохранения Душанбе для предотвращения распространения инфекции коронавируса было предоставлено 20 тысяч тестов для определения вируса COVID-19, 20 единиц оборудования искусственной вентиляции легких (ИВЛ) и 500 комплектов специальной медицинской одежды.</li>
        </ul>';
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();



        $page = Page::where("ruTitle", "Сертификаты")->first();
        $page->image = "sertificates.jpg";
        $page->ruMainText = "<p>Компетенции ТГЭМ подтверждены широким спектром сертификатов, в том числе:</p>
        <ul>
        <li>Сертификат Системы менеджмента охраны здоровья и обеспечения безопасности труда &ndash;&nbsp;<strong>OHSAS 18001:2015</strong></li>
        <li>Сертификат Системы экологического менеджмента &ndash;&nbsp;<strong>ISO 14001:2015</strong></li>
        <li>Сертификат Системы менеджмента качества &ndash;&nbsp;<strong>ISO 9001:2015</strong></li>
        </ul>
        <p>Сертификат Качества ISO 9001 подтверждает, что компания в своей работе соблюдает и постоянно совершенствует систему управления качеством, соответствующую международным стандартам качества, а Система менеджмента окружающей среды ISO 14001 обеспечивает интеграцию всех требований по охране окружающей среды в производственные процессы, предупреждение возможных опасностей и управление их устранением. Данный стандарт также предусматривает включение руководителей самого высокого уровня в совершенствование мер по охране окружающей среды.</p>";
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();


        $page = Page::where("ruTitle", "Строительство")->first();
        $page->image = "construction.jpg";
        $page->ruMainText = "<p><strong>ТГЭМ</strong>&nbsp;это команда высококвалифицированных профессионалов, за плечами которых множество успешно реализованных масштабных строительных проектов различного назначения. Наши специалисты берут на себя все обязанности, связанные с разработкой проекта, проведением полного комплекса необходимых исследований, обеспечением соответствия объекта требованиям промышленной безопасности и охраной окружающей среды.</p>
        <p>Компания взаимодействует с заказчиком на основе местного законодательства и международных стандартов заключения договоров на управление проектом в формате&nbsp;<strong>EPC (Engineering, Procurement and Construction).</strong></p>
        <p><strong>ТГЭМ</strong>&nbsp;активно реализует проекты по строительству инфраструктурных объектов как в Республике Таджикистан, так и в странах ближнего зарубежья. Благодаря профессиональному и квалифицированному персоналу специалистов высшей категории и многолетнему опыту Компания занимается проектированием и строительством инфраструктурных объектов любой сложности и масштаба, в том числе:</p>
        <ul>
        <li><strong>Строительством гидротехнических сооружений</strong></li>
        <li><strong>Строительством мостов, дорог и туннелей</strong></li>
        <li><strong>Строительством промышленных комплексов</strong></li>
        <li><strong>Строительством трубопроводов</strong></li>
        <li><strong>Строительством ирригационных сооружений</strong></li>
        <li><strong>Разработкой карьеров</strong></li>
        </ul>";
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();


        $page = Page::where("ruTitle", "Энергетика")->first();
        $page->image = "energy.jpg";
        $page->ruMainText = "<p>Энергетическое строительство &ndash; это стратегически важное направление деятельности нашей компании. Работа компании в области энергетического строительства предполагает инжиниринговые услуги широкого спектра. Это не только непосредственное строительство электростанций, но и инженерное проектирование, прокладка и монтаж электросетей, реконструкции подстанций любого типа и классов напряжения.</p>
        <p>Наша компания более полувека успешно работает в сфере промышленного и энергетического строительства. Успех нашей работы, прежде всего, это наша команда высокопрофессиональных инженеров и специалистов, которые имеют многолетний опыт в реализации объектов различной сложности. Это позволяет нам конкурировать с ведущими инжиниринговыми компаниями в области энергетического строительства.</p>
        <p>Мы всегда нацелены на максимальный результат своей работы. Результатом успешной реализации проектов являются строгое соблюдение заявленного бюджета, графика строительства объекта, а также подтверждение расчетных технико-экономических показателей.</p>
        <p>Являясь одной из крупнейших электромонтажных компаний в регионе, мы предлагаем комплексные решения по строительству энерго &ndash; объектов до 500 кВ включительно, в частности:</p>
        <ul>
        <li><strong>Строительство, монтаж и реконструкция ОРУ, КРУЭ и трансформаторных подстанций до 500 кВ включительно</strong></li>
        <li><strong>Монтаж, подключение и испытания электроустановок до 500 кВ включительно</strong></li>
        <li><strong>Наладка систем релейной защиты, автоматики, противоаварийной автоматики и систем АСУ ТП</strong></li>
        <li><strong>Строительство ВЛ 0.4 кВ &ndash; 500 кВ</strong></li>
        <li><strong>Монтаж кабельных линий до 500 кВ включительно</strong></li>
        <li><strong>Монтаж и наладка АСКУЭ</strong></li>
        <li><strong>Электроснабжение инфраструктурных и общегражданских сооружени</strong></li>
        </ul>";
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();


        $page = Page::where("ruTitle", "Карьера в ТГЭМ")->first();
        $page->image = "career.jpg";
        $page->ruMainText = "<p>ОАО <strong>«ТГЭМ»</strong> является одним из крупнейших и предпочтительных работодателей в Таджикистане. Сотрудники являются главным капиталом нашей Компании, их ответственность, активность и целеустремленность определяет наш успех.</p>
        <p>Своим работникам мы предлагаем:</p>
        <ul>
        <li><strong>Возможность принимать непосредственное участие в интересных и масштабных проектах;</strong></li>
        <li><strong>Работу с высокопрофессиональными работниками-наставниками;</strong></li>
        <li><strong>Возможность для профессионального и карьерного роста;</strong></li>
        <li><strong>Необходимые условия для самореализации;</strong></li>
        <li><strong>Социальные программы и поддержку.</strong></li>
        </ul>";
        $page->ruAdditionalTextBody = '<h3>Профессиональное развитие работников</h3>
        <p>В компании функционирует система непрерывной подготовки кадров, направленная на приобретение работниками необходимых знаний и профессиональных навыков. ТГЭМ использует весь спектр современных средств обучения — бизнес- практикумы, выездные семинары, специальные программы обучения, зарубежные стажировки, курсы повышения квалификации, дистанционное обучение и многое другое.</p>
        <p>Ведется активная работа с профильными учебными заведениями.</p>';
        $page->tjMainText = $page->ruMainText;
        $page->enMainText = $page->ruMainText;
        $page->tjAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->enAdditionalTextTitle = $page->ruAdditionalTextTitle;
        $page->tjAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->enAdditionalTextBody = $page->ruAdditionalTextBody;
        $page->save();


        $pages = Page::all();
        foreach($pages as $page) {
            $cleaned = preg_replace('!\s+!', ' ', $page->ruMainText);
            $cleaned = trim($cleaned); 
            $page->ruMainText = $cleaned;
            $page->tjMainText = $cleaned;
            $page->enMainText = $cleaned;

            $cleaned = preg_replace('!\s+!', ' ', $page->ruAdditionalTextBody);
            $cleaned = trim($cleaned); 
            $page->ruAdditionalTextBody = $cleaned;
            $page->tjAdditionalTextBody = $cleaned;
            $page->enAdditionalTextBody = $cleaned;

            $page->save();
        }

        //--------------------Pages Text end--------------------
        
    }
}
