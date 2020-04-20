<?php

Route::namespace('\Zashiki\ContactForm')->group(function () {
    Route::get('contact', 'Controller@index')->name('contact');
    Route::post('contact', 'Controller@send');
    Route::get('contact/thanks', 'Controller@thanks')->name('contact.thanks');
});
