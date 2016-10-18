<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


use Illuminate\Http\Request;
use PDF;
Route::get('/process-pdf', function (Request $request) {
   $snappy = App::make('snappy.pdf');
    //To file

    $header_image_url = public_path('online_app_header.png');



    $input =  $request->input('name', '<Please pass a name>');
    $text2= '

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<table class="table table-striped">
  <thead>
    <tr>
      <th>Student\'s Info</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Applicant ID:</td>
      <td>$request->input('unique_id', '-')</td>
    </tr>
    <tr>
      <td>First Name:</td>
      <td>$request->input('first_name', '-')</td>
      <td>Middle Name:</td>
      <td>$request->input('middle_name', '-')</td>
      <td>Last Name:</td>
      <td>$request->input('last_name', '-')</td>
    </tr>
  </tbody>
</table>';
    // $text= '<style type="text/css">.tg {border-collapse:collapse;border-spacing:0;}.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg .tg-hgcj{font-weight:bold;text-align:center}.tg .tg-9hbo{font-weight:bold;vertical-align:top}.tg .tg-yw4l{vertical-align:top}.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}</style><table width="400" class="tg"> <tr> <th class="tg-hgcj" colspan="6">Student\'s Info</th> </tr> <tr> <td class="tg-9hbo">Name:</td> <td class="tg-yw4l">Gulshan</td> <td class="tg-yw4l">Jubaed</td> <td class="tg-yw4l">Prince</td> <td class="tg-9hbo">Gender:</td> <td class="tg-yw4l">Male</td> </tr> <tr> <td class="tg-9hbo">Citizenship:</td> <td class="tg-yw4l">Bangladeshi</td> <td class="tg-9hbo">Date of Birth</td> <td class="tg-yw4l">27/2/1933</td> <td class="tg-9hbo">Contact No:</td> <td class="tg-yw4l">01674983245</td> </tr> <tr> <td class="tg-9hbo">E-mail ID:</td> <td class="tg-yw4l">jubaedprince@hotmail.com</td> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="3">Flat-D2, 163/164 Janata Housing</td> </tr> <tr> <td class="tg-9hbo">Postal Code:</td> <td class="tg-yw4l">1216</td> <td class="tg-9hbo">Thana:</td> <td class="tg-yw4l">Dhaka</td> <td class="tg-9hbo">District:</td> <td class="tg-yw4l">Dhaka</td> </tr> <tr> <td class="tg-9hbo">Facebook Profile URL:</td> <td class="tg-yw4l">https://www.facebook.com/jubaedprince</td> <td class="tg-9hbo">Twitter Handle:</td> <td class="tg-yw4l">jubaedprince</td> <td class="tg-9hbo">Instagram ID:</td> <td class="tg-yw4l">jubaedprince</td> </tr> <tr> <td class="tg-amwm" colspan="6">School\'s Info</td> </tr> <tr> <td class="tg-9hbo">School Name:</td> <td class="tg-yw4l" colspan="5">St. Joseph Higher Secondary School</td> </tr> <tr> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="2">Asad Avenue, Dhaka, Bangladesh</td> <td class="tg-9hbo">Phone:</td> <td class="tg-yw4l" colspan="2">02891223</td> </tr> <tr> <td class="tg-9hbo">Class currently studying:</td> <td class="tg-yw4l">9</td> <td class="tg-9hbo">Class studied in 2015-2016:</td> <td class="tg-yw4l">8</td> <td class="tg-9hbo">Class studied in 2014-2015:</td> <td class="tg-yw4l">7</td> </tr> <tr> <td class="tg-9hbo">Current percentage marks:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2015-2016:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2014-2015:</td> <td class="tg-yw4l">90</td> </tr> <tr> <td class="tg-amwm" colspan="6">Travel &amp; Family Immigration Info</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Have you visited the United States in previous 5 years?:</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">If yes, when and where?:</td> <td class="tg-yw4l">29/29/2 Dhaka Bangladesh</td> </tr> <tr> <td class="tg-9hbo">Purpose of your visit:</td> <td class="tg-yw4l">Travel</td> <td class="tg-9hbo">How long did you stay?</td> <td class="tg-yw4l" colspan="3">2 months</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Has anyone in your immediate family applied for U.S. immigration?</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family a U.S. Green Card holder?</td> <td class="tg-yw4l">No</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family living in U.S.A?</td> <td class="tg-yw4l">Yes</td> <td class="tg-9hbo" colspan="2">Is any of your relatives living in U.S.A?</td> <td class="tg-yw4l">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, which state?</td> <td class="tg-yw4l">Mississippi</td> <td class="tg-9hbo">Do you hold a U.S Visa?</td> <td class="tg-yw4l" colspan="3">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, date of expiry?</td> <td class="tg-yw4l" colspan="5"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr></table>';
   // $html = '<h1>Welcome</h1><p style="background-color: yellow;">Hello '. $text2 . '';
    $name = 'YES Application Form 2017-18 (Applicant ID: ' . $request->input('unique_id', '-') . ')';

    try {
      PDF::loadHTML($text2)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 10)->save('/tmp/' .$name. '.pdf');
    } catch (Exception $e) {
        // return Response::download('/tmp/' . $name. '.pdf');
        die("Sorry! You can't get the filled application form again for security reasons. You will have to resubmit the form again. Please start over. If you are having trouble please contact iEARN-BD. ");
    }



    // $snappy->generateFromHtml($html, '/tmp/'.$name.'.pdf');
    // return Response::make(file_get_contents('/tmp/' .$name. '.pdf'), 200, [
    // 'Content-Type' => 'application/pdf',
    // ]);

    // return Response::download(file_get_contents('/tmp/' . $name. '.pdf'), 'filename.pdf', [
    // 'Content-Type' => 'application/pdf',
    // ]);

    return Response::download('/tmp/' . $name. '.pdf');


});


Route::group(['middleware'=>'key'], function(){
    Route::get('ballot', 'ElectionController@ballot');
    Route::post('ballot', 'ElectionController@processBallot');
});

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function(){
    Route::get('/', 'DashboardController@home');

    Route::get('/count', 'ElectionController@countVote');

    Route::get('/result', 'ElectionController@count');

    Route::get('/send', 'ElectionController@sendAllBallot');

    Route::get('/sendEmail', 'ElectionController@sendEmail');

    Route::resource('voter', 'VoterController', ['except' => ['edit', 'update']]);

    Route::resource('candidate', 'CandidateController', ['except' => ['edit', 'update']]);

    Route::post('voter/{id}/resend', 'ElectionController@resendBallot');
    Route::get('/start-vote', 'ElectionController@startElection');
    Route::get('/end-vote', 'ElectionController@stopElection');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
