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
    
    $input =  $request->input('name', '<Please pass a name>');
    $text2= '<style>
    
.headline{
  text-align: center;
  background-color: grey;
}
table, th, td {
   border:1px solid grey;
}

th, td {
  padding: 10px;
  text-align: left;
}
.heading { font-weight: bold; }

</style>

<table>
  <tr>
    <td class="headline" colspan="6">Student\'s Info</td>
  </tr>
  <tr>
    <td class="heading">First Name:</td>
    <td>'.  $request->input('first_name', '-') .'</td>
    <td class="heading">Middle Name:</td>
    <td>'.  $request->input('middle_name', '-') .'</td>
    <td class="heading">Last Name:</td>
    <td>'.  $request->input('last_name', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Gender:</td>
    <td>'.  $request->input('sex', '-') .'</td>
    <td class="heading">Citizenship:</td>
    <td>'.  $request->input('citizenship', '-') .'</td>
    <td class="heading">Date of Birth:</td>
    <td>'.  $request->input('dob', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Contact No:</td>
    <td>'.  $request->input('contact', '-') .'</td>
    <td class="heading">E-mail ID:</td>
    <td colspan="3">'.  $request->input('email', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Address:</td>
    <td colspan="5">'.  $request->input('address', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Postal Code:</td>
    <td>'.  $request->input('postalCode', '-') .'</td>
    <td class="heading">Thana:</td>
    <td>'.  $request->input('thana', '-') .'</td>
    <td class="heading">District:</td>
    <td>'.  $request->input('district', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Facebook Profile URL:</td>
    <td>'.  $request->input('facebookURL', '-') .'</td>
    <td class="heading">Twitter Handle:</td>
    <td>'.  $request->input('twitterHandle', '-') .'</td>
    <td class="heading">Instagram ID:</td>
    <td>'.  $request->input('instagramID', '-') .'</td>
  </tr>
  <tr>
    <td class="headline" colspan="6">School\'s Info</td>
  </tr>
  <tr>
    <td class="heading">School Name:</td>
    <td colspan="3">'.  $request->input('schoolName', '-') .'</td>
    <td class="heading">Phone:</td>
    <td>'.  $request->input('schoolPhone', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Address:</td>
    <td colspan="5">'.  $request->input('schoolAddress', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Class currently studying:</td>
    <td>'.  $request->input('classCurrentlyStudying', '-') .'</td>
    <td class="heading">Class studied in 2015-2016:</td>
    <td>'.  $request->input('classStudiedIn20152016', '-') .'</td>
    <td class="heading">Class studied in 2014-2015:</td>
    <td>'.  $request->input('classStudiedIn20142015', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Current percentage marks:</td>
    <td>'.  $request->input('currentPercentageMarks', '-') .'</td>
    <td class="heading">Percentage makes in 2015-2016:</td>
    <td>'.  $request->input('percentageMarksIn20152016', '-') .'</td>
    <td class="heading">Percentage makes in 2014-2015:</td>
    <td>'.  $request->input('percentageMarksIn20142015', '-') .'</td>
  </tr>
  <tr>
    <td class="headline" colspan="6">Travel &amp; Family Immigration Info</td>
  </tr>
  <tr>
    <td  class="heading" colspan="5">Have you visited the United States in previous 5 years?:</td>
    <td>'.  $request->input('visitedUS5', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" >If yes, when and where?:</td>
    <td>'.  $request->input('visitedUS5WhenAndWhere', '-') .'</td>
    <td class="heading" >Purpose of your visit:</td>
    <td>'.  $request->input('visitedUS5Purpose', '-') .'</td>
    <td  class="heading">How long did you stay?</td>
    <td>'.  $request->input('visitedUS5HowLong', '-') .'</td>
  </tr>
  <tr>
    <td  class="heading" colspan="5">Has anyone in your immediate family applied for U.S. immigration?</td>
    <td>'.  $request->input('familyImmigration', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" colspan="5">Is anyone in your immediate family a U.S. Green Card holder?</td>
    <td>'.  $request->input('familyGreenCard', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" colspan="5">Is anyone in your immediate family living in U.S.A?</td>
    <td>'.  $request->input('familyLivingInUSA', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" colspan="2">Is any of your relatives living in U.S.A?</td>
    <td>'.  $request->input('relativesLivingInUSA', '-') .'</td>
    <td class="heading" colspan="2">If yes, which state?</td>
    <td>'.  $request->input('relativesLivingInUSAState', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" colspan="2">Do you hold a U.S Visa?</td>
    <td>'.  $request->input('holdUSVisa', '-') .'</td>
    <td class="heading" colspan="2">If yes, date of expiry?</td>
    <td>'.  $request->input('holdUSVisaExpiry', '-') .'</td>
  </tr>
  <tr>
    <td class="headline" colspan="6">Please answer the following questions in 100 words or less.</td>
  </tr>
  <tr>
    <td class="heading" colspan="6">Tell us about yourself, like your hobbies, activities, interests or anything you will like us to know on this application.</td>
  </tr>
  <tr>
    <td colspan="6">'.  $request->input('aboutYourself', '-') .'</td>
  </tr>
  <tr>
    <td class="heading" colspan="6">Community service is very important part of the program. Please describe any community service projects you have participated. If you have not, what kind of community service projects would you be interested in?</td>
  </tr>
  <tr>
    <td colspan="6">'.  $request->input('aboutCommunityWork', '-') .'</td>
  </tr>
  <tr>
    <td class="headline" colspan="6">Father\'s Info</td>
  </tr>
  <tr>
    <td class="heading">First Name:</td>
    <td>'.  $request->input('fatherFirstName', '-') .'</td>
    <td class="heading">Middle Name:</td>
    <td>'.  $request->input('fatherMiddleName', '-') .'</td>
    <td class="heading">Last Name:</td>
    <td>'.  $request->input('fatherLastName', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Contact No:</td>
    <td>'.  $request->input('fatherContact', '-') .'</td>
    <td class="heading">E-mail ID:</td>
    <td>'.  $request->input('fatherEmailID', '-') .'</td>
    <td class="heading">Occupation:</td>
    <td>'.  $request->input('fatherOccupation', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Office Phone:</td>
    <td>'.  $request->input('fatherOfficePhone', '-') .'</td>
    <td colspan="4"></td>
  </tr>
  <tr>
    <td class="headline" colspan="6">Mother\'s Info</td>
  </tr>
  <tr>
    <td class="heading">First Name:</td>
    <td>'.  $request->input('motherFirstName', '-') .'</td>
    <td class="heading">Middle Name:</td>
    <td>'.  $request->input('motherMiddleName', '-') .'</td>
    <td class="heading">Last Name:</td>
    <td>'.  $request->input('motherLastName', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Contact No:</td>
    <td>'.  $request->input('motherContact', '-') .'</td>
    <td class="heading">E-mail ID:</td>
    <td>'.  $request->input('motherEmailID', '-') .'</td>
    <td class="heading">Occupation:</td>
    <td>'.  $request->input('motherOccupation', '-') .'</td>
  </tr>
  <tr>
    <td class="heading">Office Phone:</td>
    <td>'.  $request->input('motherOfficePhone', '-') .'</td>
    <td colspan="4"></td>
  </tr>
  <tr>
    <td class="headline" colspan="6">Signatures</td>
  </tr>
  <tr>
    <td class="heading">Student:</td>
    <td></td>
    <td class="heading">Father:</td>
    <td></td>
    <td class="heading">Mother:</td>
    <td></td>
  </tr>
  <tr>
    <td class="heading">Head of School/College</td>
    <td colspan="2"></td>
    <td class="heading">School Official Seal</td>
    <td colspan="2"></td>
  </tr>
</table>';
    // $text= '<style type="text/css">.tg {border-collapse:collapse;border-spacing:0;}.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg .tg-hgcj{font-weight:bold;text-align:center}.tg .tg-9hbo{font-weight:bold;vertical-align:top}.tg .tg-yw4l{vertical-align:top}.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}</style><table width="400" class="tg"> <tr> <th class="tg-hgcj" colspan="6">Student\'s Info</th> </tr> <tr> <td class="tg-9hbo">Name:</td> <td class="tg-yw4l">Gulshan</td> <td class="tg-yw4l">Jubaed</td> <td class="tg-yw4l">Prince</td> <td class="tg-9hbo">Gender:</td> <td class="tg-yw4l">Male</td> </tr> <tr> <td class="tg-9hbo">Citizenship:</td> <td class="tg-yw4l">Bangladeshi</td> <td class="tg-9hbo">Date of Birth</td> <td class="tg-yw4l">27/2/1933</td> <td class="tg-9hbo">Contact No:</td> <td class="tg-yw4l">01674983245</td> </tr> <tr> <td class="tg-9hbo">E-mail ID:</td> <td class="tg-yw4l">jubaedprince@hotmail.com</td> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="3">Flat-D2, 163/164 Janata Housing</td> </tr> <tr> <td class="tg-9hbo">Postal Code:</td> <td class="tg-yw4l">1216</td> <td class="tg-9hbo">Thana:</td> <td class="tg-yw4l">Dhaka</td> <td class="tg-9hbo">District:</td> <td class="tg-yw4l">Dhaka</td> </tr> <tr> <td class="tg-9hbo">Facebook Profile URL:</td> <td class="tg-yw4l">https://www.facebook.com/jubaedprince</td> <td class="tg-9hbo">Twitter Handle:</td> <td class="tg-yw4l">jubaedprince</td> <td class="tg-9hbo">Instagram ID:</td> <td class="tg-yw4l">jubaedprince</td> </tr> <tr> <td class="tg-amwm" colspan="6">School\'s Info</td> </tr> <tr> <td class="tg-9hbo">School Name:</td> <td class="tg-yw4l" colspan="5">St. Joseph Higher Secondary School</td> </tr> <tr> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="2">Asad Avenue, Dhaka, Bangladesh</td> <td class="tg-9hbo">Phone:</td> <td class="tg-yw4l" colspan="2">02891223</td> </tr> <tr> <td class="tg-9hbo">Class currently studying:</td> <td class="tg-yw4l">9</td> <td class="tg-9hbo">Class studied in 2015-2016:</td> <td class="tg-yw4l">8</td> <td class="tg-9hbo">Class studied in 2014-2015:</td> <td class="tg-yw4l">7</td> </tr> <tr> <td class="tg-9hbo">Current percentage marks:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2015-2016:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2014-2015:</td> <td class="tg-yw4l">90</td> </tr> <tr> <td class="tg-amwm" colspan="6">Travel &amp; Family Immigration Info</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Have you visited the United States in previous 5 years?:</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">If yes, when and where?:</td> <td class="tg-yw4l">29/29/2 Dhaka Bangladesh</td> </tr> <tr> <td class="tg-9hbo">Purpose of your visit:</td> <td class="tg-yw4l">Travel</td> <td class="tg-9hbo">How long did you stay?</td> <td class="tg-yw4l" colspan="3">2 months</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Has anyone in your immediate family applied for U.S. immigration?</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family a U.S. Green Card holder?</td> <td class="tg-yw4l">No</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family living in U.S.A?</td> <td class="tg-yw4l">Yes</td> <td class="tg-9hbo" colspan="2">Is any of your relatives living in U.S.A?</td> <td class="tg-yw4l">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, which state?</td> <td class="tg-yw4l">Mississippi</td> <td class="tg-9hbo">Do you hold a U.S Visa?</td> <td class="tg-yw4l" colspan="3">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, date of expiry?</td> <td class="tg-yw4l" colspan="5"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr></table>';
   // $html = '<h1>Welcome</h1><h2 style="background-color: yellow;">Hello '. $text2 . '';
    $name = str_random(10);
    PDF::loadHTML($text2)->setPaper('a4')->setOrientation('portrait')->setOption('margin-bottom', 0)->save('/tmp/' .$name. '.pdf');

    // $snappy->generateFromHtml($html, '/tmp/'.$name.'.pdf');
    return Response::make(file_get_contents('/tmp/' .$name. '.pdf'), 200, [
    'Content-Type' => 'application/pdf',
    ]);


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