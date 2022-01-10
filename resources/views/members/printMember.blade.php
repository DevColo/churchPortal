<!DOCTYPE html>
<html>
<head>
	<title>List</title>
	<style type="text/css">
		table{
      width: 100%;
    border-cobackground: #0a3a2d;llapse: collapse;
    border-spacing: 0;
    line-height: 20px;
    }
    th{
      border-bottom-width: 2px;
    line-height: 1.428571;
    text-align: center !important;
    font-size: 14px;
    font-family: system-ui;
    font-weight: 500;
    color: #ffffff;border-bottom-width: 2px;
    background: #123806;
    /*background: #0a3a2d;*/
    border: 1px solid #dddddd;
    padding: 10px;
    line-height: 1.428571;
    font-size: 14px;
    font-family: system-ui;
    font-weight: 700;
    }
    
    td {
    border: 1px solid #dddddd;
    line-height: 1.428571;
    text-align: center;
    font-family: sans-serif;
    color: #525252;
    font-size: 14px;
    padding:10px;
}
</style>
</head>
<body>
	<div style="width:100%; height: 100px;background:#fff;margin-bottom: 20px;">

		<img src="img/logo.jpg" width="85px" style="float:left;margin-top:-12px;position:relative;">
				<img src="images/{{$pic}}" width="70px" style="float:right;margin-top:-12px;position:relative;">
				<h3 style="text-align:center;position:relative;margin-top:-5px;font-family:sans-serif;">St. Peter's Lutheran Parish</h3>
				<h4 style="text-align: center;font-family:;margin-top:-8px;">14<sup>th</sup> Street, Sinkor <br> Monrovia, Liberia</h4>
			<div style="margin-top:-5px;">	<p style="text-align: center;text-decoration:underline;">Membership Form</p></div>
	</div>
  <table>
  <thead>
  @foreach($details as $details)
      <tr>
        <th>Member ID</th>
        <th>Last Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
      </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
                <tr>
                <td>{{$details->member_id}}</td>
          <td>{{$details->fname}}</td>                    
          <td>{{$details->mname}}</td>
          <td>{{$details->lname}}</td>
                </tr>

                <tr>
        <th>Date of Birth</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Phone</th>
      </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
            
                <tr>
                    <td>{{$details->DOB}}</td>
          <td>{{$details->sex}}</td>
          <td>{{$details->address}}</td>
          <td>{{$details->cell}}</td>
                </tr>

                <tr>
        <th>Department</th>
        <th></th>
        <th>Address</th>
        <th>Phone</th>
      </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
            
                <tr>
                    <td>{{$dept}}</td>
          <td>{{$details->sex}}</td>
          <td>{{$details->address}}</td>
          <td>{{$details->cell}}</td>
                </tr>
            @endforeach
  </table>
  <br><br>
        <b style="float:left;font-size:14px;">SIGNED:<u> Head of Department</u></b><br><br><br>
        <b style="float:left;font-size:14px;float:right !important;">APPROVED:<u>Curch Leadership</u></b>
</body>
</html>