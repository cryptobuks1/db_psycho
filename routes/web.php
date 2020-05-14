<?php
Route::get('/signal/token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI2NzMzNDgsImV4cCI6MTUzMjY3Njk0OCwibmJmIjoxNTMyNjczMzQ4LCJqdGkiOiIzTUg4a3RVRVFNbnlxVXdCIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.N9hf6gicuZoupCDUQI5LSg-yd0ala696daHQKWtGztQ',
    'Signal\SignalTestController@index')->name('signal');


Route::get("/{any}", function()
{
    return view('home');
})->where('any', '.*');

Route::get("/", function()
{
    return view('home');
});


Route::post('/signal/token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI2NzMzNDgsImV4cCI6MTUzMjY3Njk0OCwibmJmIjoxNTMyNjczMzQ4LCJqdGkiOiIzTUg4a3RVRVFNbnlxVXdCIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.N9hf6gicuZoupCDUQI5LSg-yd0ala696daHQKWtGztQ',
    'Signal\SignalTestController@index')->name('signal');

Route::post('/access/token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hZG1pbi1wYW5lbC5sb2NcL2FwaVwvbG9naW4iLCJpYXQiOjE1MzI2NzMzNDgsImV4cCI6MTUzMjY3Njk0OCwibmJmIjoxNTMyNjczMzQ4LCJqdGkiOiIzTUg4a3RVRVFNbnlxVXdCIiwic3ViIjoxLCJwcnYiOiJlNjVmNzliZmI5NzA5MzYyOTQ3NDU0NGZhYmI3ZDExZjAwN2E4OTczIn0.N9hf6gicuZoupCDUQI5LSg-yd0ala696daHQKWtGztQ',
    'Signal\AccessController@index')->name('access');

/*-----------------API NET BANK---------------------*/

Route::post('/create/update/bank/net', 'Signal\ApiNetBanksController@index')->name('create-update-bank-net');
Route::post('/bn/signal/bank/net', 'Signal\BankNet\BnSignalsController@index')->name('bn-signal-bank-net');
Route::post('/bn/data/log/bank/net', 'Signal\BankNet\BnDataLogsController@index')->name('bn-data-log--bank-net');

/*-----------------END API NET BANK---------------------*/

