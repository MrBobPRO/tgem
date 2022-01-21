<h1>Новое сообщение из онлайн-приёмной генерального директора сайта <a href="{{ route('contacts.booking') }}">https://tgem.tj/</a></h1>
<p><b>Сообщение от :</b> {{ $request->name }}</p>
<p><b>Организация :</b> {{ $request->organization }}</p>
<p><b>Город :</b> {{ $request->city }}</p>
<p><b>Телефон :</b> {{ $request->phone }}</p>
<p><b>E-mail :</b> {{ $request->email }}</p>
<p><b>Сообщение :</b> {{ $request->body }}</p>