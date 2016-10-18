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
    $text2= '<style>
.row {
  padding: 2px;
  border: 1px solid #d3d3d3;
}

.headline{
  color: white;
  text-align: center;
  background-color: grey;
}

.tall {
   height: 120px;
}

.heading { font-weight: bold; }

* {
   font-size: 14px;
}

</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<div>
    <div class="col-xs-12">
      <div class="row">
        <div class="col-xs-12">
          <img width="99%" src="'. $header_image_url .'"><hr style="margin:0px;padding:0px">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-1 col-xs-1 heading">Applicant ID:</div>
        <div class="col-xs-3">'.  $request->input('unique_id', '-') .'</div>
        <div class="col-xs-8 headline">Student\'s Info</div>
      </div>
      <div class="row">
        <div class="col-xs-1 col-xs-1 heading">First Name:</div>
        <div class="col-xs-3">'.  $request->input('first_name', '-') .'</div>
        <div class="col-xs-1 col-xs-1 heading">Middle Name:</div>
        <div class="col-xs-3">'.  $request->input('middle_name', '-') .'</div>
        <div class="col-xs-1 col-xs-1 heading">Last Name:</div>
        <div class="col-xs-3">'.  $request->input('last_name', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Gender:</div>
        <div class="col-xs-3">'.  $request->input('sex', '-') .'</div>
        <div class="col-xs-1 heading">Citizenship:</div>
        <div class="col-xs-3">'.  $request->input('citizenship', '-') .'</div>
        <div class="col-xs-1 heading">Date of Birth:</div>
        <div class="col-xs-3">'.  $request->input('dob', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Contact No:</div>
        <div class="col-xs-3">'.  $request->input('contact', '-') .'</div>
        <div class="col-xs-1 heading">E-mail ID:</div>
        <div class="col-xs-3" >'.  $request->input('email', '-') .'</div>
        <div class="col-xs-1 heading">Age on 1/8/2017:</div>
        <div class="col-xs-3">'.  $request->input('ageOnFirstAugust', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Address:</div>
        <div class="col-xs-11">'.  $request->input('address', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Postal Code:</div>
        <div class="col-xs-3">'.  $request->input('postalCode', '-') .'</div>
        <div class="col-xs-1 heading">Thana:</div>
        <div class="col-xs-3">'.  $request->input('thana', '-') .'</div>
        <div class="col-xs-1 heading">District:</div>
        <div class="col-xs-3">'.  $request->input('disdivict', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Facebook Profile URL:</div>
        <div class="col-xs-3">'.  $request->input('facebookURL', '-') .'</div>
        <div class="col-xs-1 heading">Twitter Handle:</div>
        <div class="col-xs-3">'.  $request->input('twitterHandle', '-') .'</div>
        <div class="col-xs-1 heading">Instagram ID:</div>
        <div class="col-xs-3">'.  $request->input('instagramID', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline">School\'s Info</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">School Name:</div>
        <div class="col-xs-7">'.  $request->input('schoolName', '-') .'</div>
        <div class="col-xs-1 heading">Phone:</div>
        <div class="col-xs-3">'.  $request->input('schoolPhone', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Address:</div>
        <div class="col-xs-11">'.  $request->input('schoolAddress', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Class currently studying:</div>
        <div class="col-xs-3">'.  $request->input('classCurrentlyStudying', '-') .'</div>
        <div class="col-xs-1 heading">Class studied in 2015-2016:</div>
        <div class="col-xs-3">'.  $request->input('classStudiedIn20152016', '-') .'</div>
        <div class="col-xs-1 heading">Class studied in 2014-2015:</div>
        <div class="col-xs-3">'.  $request->input('classStudiedIn20142015', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Current percentage marks:</div>
        <div class="col-xs-3">'.  $request->input('currentPercentageMarks', '-') .'</div>
        <div class="col-xs-1 heading">Percentage marks in 2015-2016:</div>
        <div class="col-xs-3">'.  $request->input('percentageMarksIn20152016', '-') .'</div>
        <div class="col-xs-1 heading">Percentage marks in 2014-2015:</div>
        <div class="col-xs-3">'.  $request->input('percentageMarksIn20142015', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline">divavel &amp; Family Immigration Info</div>
      </div>
      <div class="row">
        <div  class="col-xs-8 heading">Have you visited the United States in previous 5 years?:</div>
        <div class="col-xs-4">'.  $request->input('visitedUS5', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading" >If yes, when and where?:</div>
        <div class="col-xs-3">'.  $request->input('visitedUS5WhenAndWhere', '-') .'</div>
        <div class="col-xs-1 heading" >Purpose of your visit:</div>
        <div class="col-xs-3">'.  $request->input('visitedUS5Purpose', '-') .'</div>
        <div  class="col-xs-1 heading">How long did you stay?</div>
        <div class="col-xs-3">'.  $request->input('visitedUS5HowLong', '-') .'</div>
      </div>
      <div class="row">
        <div  class="col-xs-8 heading">Has anyone in your immediate family applied for U.S. immigration?</div>
        <div class="col-xs-4">'.  $request->input('familyImmigration', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-8 heading">Is anyone in your immediate family a U.S. Green Card holder?</div>
        <div class="col-xs-4">'.  $request->input('familyGreenCard', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-8 heading">Is anyone in your immediate family living in U.S.A?</div>
        <div class="col-xs-4">'.  $request->input('familyLivingInUSA', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-6 heading">Is any of your relatives living in U.S.A?</div>
        <div class="col-xs-2">'.  $request->input('relativesLivingInUSA', '-') .'</div>
        <div class="col-xs-1 heading">If yes, which state?</div>
        <div class="col-xs-3">'.  $request->input('relativesLivingInUSAState', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Do you hold a U.S Visa?</div>
        <div class="col-xs-3">'.  $request->input('holdUSVisa', '-') .'</div>
        <div class="col-xs-1 heading">If yes, date of expiry?</div>
        <div class="col-xs-3">'.  $request->input('holdUSVisaExpiry', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline" >Please answer the following questions in 100 words or less.</div>
      </div>
      <div class="row">
        <div class="col-xs-12 heading" >Tell us about yourself, like your hobbies, activities, interests or anything you will like us to know on this application.</div>
      </div>
      <div class="row">
        <div class="col-xs-12" >'.  $request->input('aboutYourself', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-12 heading">Community service is very important part of the program. Please describe any community service projects you have participated. If you have not, what kind of community service projects would you be interested in?</div>
      </div>
      <div class="row">
        <div class="col-xs-12" >'.  $request->input('aboutCommunityWork', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline">Father\'s Info</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">First Name:</div>
        <div class="col-xs-3">'.  $request->input('fatherFirstName', '-') .'</div>
        <div class="col-xs-1 heading">Middle Name:</div>
        <div class="col-xs-3">'.  $request->input('fatherMiddleName', '-') .'</div>
        <div class="col-xs-1 heading">Last Name:</div>
        <div class="col-xs-3">'.  $request->input('fatherLastName', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Contact No:</div>
        <div class="col-xs-3">'.  $request->input('fatherContact', '-') .'</div>
        <div class="col-xs-1 heading">E-mail ID:</div>
        <div class="col-xs-3">'.  $request->input('fatherEmailID', '-') .'</div>
        <div class="col-xs-1 heading">Occupation:</div>
        <div class="col-xs-3">'.  $request->input('fatherOccupation', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Office Phone:</div>
        <div class="col-xs-3">'.  $request->input('fatherOfficePhone', '-') .'</div>
        <div class="col-xs-8"></div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline">Mother\'s Info</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">First Name:</div>
        <div class="col-xs-3">'.  $request->input('motherFirstName', '-') .'</div>
        <div class="col-xs-1 heading">Middle Name:</div>
        <div class="col-xs-3">'.  $request->input('motherMiddleName', '-') .'</div>
        <div class="col-xs-1 heading">Last Name:</div>
        <div class="col-xs-3">'.  $request->input('motherLastName', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Contact No:</div>
        <div class="col-xs-3">'.  $request->input('motherContact', '-') .'</div>
        <div class="col-xs-1 heading">E-mail ID:</div>
        <div class="col-xs-3">'.  $request->input('motherEmailID', '-') .'</div>
        <div class="col-xs-1 heading">Occupation:</div>
        <div class="col-xs-3">'.  $request->input('motherOccupation', '-') .'</div>
      </div>
      <div class="row">
        <div class="col-xs-1 heading">Office Phone:</div>
        <div class="col-xs-3">'.  $request->input('motherOfficePhone', '-') .'</div>
        <div class="col-xs-8" ></div>
      </div>
      <div class="row">
        <div class="col-xs-12 headline">Signatures</div>
      </div>
      <div class="row tall">
        <div class="col-xs-3 heading">Student:</div>
        <div class="col-xs-9"></div>
      </div>
      <div class="row tall">
        <div class="col-xs-3 heading">Father:</div>
        <div class="col-xs-9"></div>
      </div>
      <div class="row tall">
        <div class="col-xs-3 heading">Mother:</div>
        <div class="col-xs-9"></div>
      </div>
        <div class="row tall">
        <div class="col-xs-3 heading">Head of School/College</div>
        <div class="col-xs-9"></div>
      </div>
      <div class="row tall">
        <div class="col-xs-3 heading">School Official Seal</div>
        <div class="col-xs-9"></div>
      </div>
    </div>
</div>';
    // $text= '<style type="text/css">.tg {border-collapse:collapse;border-spacing:0;}.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 8px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}.tg .tg-hgcj{font-weight:bold;text-align:center}.tg .tg-9hbo{font-weight:bold;vertical-align:top}.tg .tg-yw4l{vertical-align:top}.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}</style><table width="400" class="tg"> <tr> <th class="tg-hgcj" colspan="6">Student\'s Info</th> </tr> <tr> <td class="tg-9hbo">Name:</td> <td class="tg-yw4l">Gulshan</td> <td class="tg-yw4l">Jubaed</td> <td class="tg-yw4l">Prince</td> <td class="tg-9hbo">Gender:</td> <td class="tg-yw4l">Male</td> </tr> <tr> <td class="tg-9hbo">Citizenship:</td> <td class="tg-yw4l">Bangladeshi</td> <td class="tg-9hbo">Date of Birth</td> <td class="tg-yw4l">27/2/1933</td> <td class="tg-9hbo">Contact No:</td> <td class="tg-yw4l">01674983245</td> </tr> <tr> <td class="tg-9hbo">E-mail ID:</td> <td class="tg-yw4l">jubaedprince@hotmail.com</td> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="3">Flat-D2, 163/164 Janata Housing</td> </tr> <tr> <td class="tg-9hbo">Postal Code:</td> <td class="tg-yw4l">1216</td> <td class="tg-9hbo">Thana:</td> <td class="tg-yw4l">Dhaka</td> <td class="tg-9hbo">District:</td> <td class="tg-yw4l">Dhaka</td> </tr> <tr> <td class="tg-9hbo">Facebook Profile URL:</td> <td class="tg-yw4l">https://www.facebook.com/jubaedprince</td> <td class="tg-9hbo">Twitter Handle:</td> <td class="tg-yw4l">jubaedprince</td> <td class="tg-9hbo">Instagram ID:</td> <td class="tg-yw4l">jubaedprince</td> </tr> <tr> <td class="tg-amwm" colspan="6">School\'s Info</td> </tr> <tr> <td class="tg-9hbo">School Name:</td> <td class="tg-yw4l" colspan="5">St. Joseph Higher Secondary School</td> </tr> <tr> <td class="tg-9hbo">Address:</td> <td class="tg-yw4l" colspan="2">Asad Avenue, Dhaka, Bangladesh</td> <td class="tg-9hbo">Phone:</td> <td class="tg-yw4l" colspan="2">02891223</td> </tr> <tr> <td class="tg-9hbo">Class currently studying:</td> <td class="tg-yw4l">9</td> <td class="tg-9hbo">Class studied in 2015-2016:</td> <td class="tg-yw4l">8</td> <td class="tg-9hbo">Class studied in 2014-2015:</td> <td class="tg-yw4l">7</td> </tr> <tr> <td class="tg-9hbo">Current percentage marks:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2015-2016:</td> <td class="tg-yw4l">90</td> <td class="tg-9hbo">Percentage makes in 2014-2015:</td> <td class="tg-yw4l">90</td> </tr> <tr> <td class="tg-amwm" colspan="6">Travel &amp; Family Immigration Info</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Have you visited the United States in previous 5 years?:</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">If yes, when and where?:</td> <td class="tg-yw4l">29/29/2 Dhaka Bangladesh</td> </tr> <tr> <td class="tg-9hbo">Purpose of your visit:</td> <td class="tg-yw4l">Travel</td> <td class="tg-9hbo">How long did you stay?</td> <td class="tg-yw4l" colspan="3">2 months</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Has anyone in your immediate family applied for U.S. immigration?</td> <td class="tg-yw4l">No</td> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family a U.S. Green Card holder?</td> <td class="tg-yw4l">No</td> </tr> <tr> <td class="tg-9hbo" colspan="2">Is anyone in your immediate family living in U.S.A?</td> <td class="tg-yw4l">Yes</td> <td class="tg-9hbo" colspan="2">Is any of your relatives living in U.S.A?</td> <td class="tg-yw4l">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, which state?</td> <td class="tg-yw4l">Mississippi</td> <td class="tg-9hbo">Do you hold a U.S Visa?</td> <td class="tg-yw4l" colspan="3">Yes</td> </tr> <tr> <td class="tg-9hbo">If yes, date of expiry?</td> <td class="tg-yw4l" colspan="5"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr> <tr> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> <td class="tg-yw4l"></td> </tr></table>';
   // $html = '<h1>Welcome</h1><h2 style="background-color: yellow;">Hello '. $text2 . '';
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