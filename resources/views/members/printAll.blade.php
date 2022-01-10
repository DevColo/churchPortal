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
    padding: 2px;
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
}
</style>
</head>
<body>
	<div style="width:100%; height: 100px;background:#fff;margin-bottom: 20px;">

		<img src="img/logo.jpg" width="85px" style="float:left;margin-top:-12px;position:relative;">
				<img src="img/logo.jpg" width="85px" style="float:right;margin-top:-12px;position:relative;">
				<h3 style="text-align:center;position:relative;margin-top:-5px;font-family:sans-serif;">St. Peter's Lutheran Parish <br>14<sup>th</sup> Street, Sinkor <br> Monrovia, Liberia</h3>
				
			<div style="margin-top:-5px;">	<p style="text-align: center;text-decoration:underline;">General Roster</p></div>

	</div>
    <p>Total Members: {{$amount}}</p>
  <table>
  <thead>
            <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Cell</th>
        <th>Email</th>
      </tr>
        </thead>
        <tbody style="background-color:#ffffff;">
            @foreach($details as $row)
                <tr>
          <td>{{$row->member_id}}</td>
          <td>{{$row->fname}}</td>
          <td>{{$row->mname}}</td>
          <td>{{$row->lname}}</td>
          <td>{{$row->cell}}</td>
          <td>{{$row->email}}</td>
                </tr>
            @endforeach
        </tbody>
  </table>
</body>
</html>