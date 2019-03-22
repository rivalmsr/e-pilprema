<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

<!-- Optional theme -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

<!-- Latest compiled and minified JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->
	<style type="text/css">
	table {
		border-collapse: collapse !important;
	}
	table td,
	table th {
		background-color: #fff !important;
	}
	table-bordered th,
	table-bordered td {
	    border: 1px solid #ddd !important;
	  }
	table-bordered {
	  border: 1px solid #ddd;
	}
	table-bordered > thead > tr > th,
	table-bordered > tbody > tr > th,
	table-bordered > tfoot > tr > th,
	table-bordered > thead > tr > td,
	table-bordered > tbody > tr > td,
	table-bordered > tfoot > tr > td {
	  border: 1px solid #ddd;
	}
	table-bordered > thead > tr > th,
	table-bordered > thead > tr > td {
	  border-bottom-width: 2px;
	}
	body {
	    font-family: "Times New Roman", Times, serif;
	    font-size: 11px;
	}
	h1 {
		margin-top: 0.5px;
		margin-bottom: 0.5px;
		text-align: center;
	}
	h2 {
		text-align: center;
		margin-top: 0.5px;
		margin-bottom: 0.5px;		
	}
	hr {
		border-style: solid;
		margin-bottom: 0.5px;
		margin-top: 0.5px;
	}
	#desc {
		text-align: justify;
		margin-top: 0.5px;
		margin-bottom: 0.5px;
	}
	#desc-table {
		text-align: left;
	}
	th {
		/*border-style: solid;*/
		background-color:#f0f0f0;
		text-align: center;
	}
	/*td {
		border-style: groove;
	}*/
	#ttd {
		width: 35%;
		text-align: center;
	}
	#header-top-table {
		/*background: black;color: white;*/
	}
	</style>
	<title></title>
</head>
<body>
<h2>E-Pilketos</h2>
<h1>SMK PGRI 1 CIMAHI</h1>
<hr>
<br>
	<p id="desc">
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa pada hari Kamis-Jum'at tanggal 25-26 bulan November tahun Dua Ribu Enam Belas telah dilaksanakan Pemilihan Umum Ketua dan Wakil Ketua Organisasi Siswa Intra Sekolah (OSIS) SMK PGRI 1 Cimahi Masa Bakti 2016 – 2017 dengan jumlah Daftar Pemilih {{$sum}} dan rincian hasil sebagai berikut:
	<p>
	<table width="100%" class="table table-bordered" border="1" style="">
		<tr id="header-table">
			<th id="header-top-table">NO URUT</th>
			<th id="header-top-table">NAMA CALON KETUA OSIS</th>
			<th id="header-top-table" width="40%">ALAMAT</th>
			<th id="header-top-table">TANGGAL LAHIR</th>
			<th id="header-top-table">SUARA</th>
		</tr>
		@foreach($candidates as $key => $value)
		<tr id="desc-table">
			<td style="text-align:center;">{{$key+1}}</td>
			<td>{{ $value->name }}</td>
			<td width="40%">{{$value->address}}</td>
			<td>{{date("d-M-Y", strtotime($value->born))}}</td>
			<td align="center">{{$value->vote}}</td>
		</tr>
		@endforeach
		<tr>
			<th colspan="4" id="desc-table">SUARA TERKUMPUL</th>
			<th>{{$users}}</th>
		</tr>
		<tr>
			<th colspan="4" id="desc-table">GOLPUT</th>
			<th>{{$golput}}</th>		
		</tr>
		<tr>
			<th colspan="4" id="desc-table">TOTAL SUARA</th>
			<th>{{$sum}}</th>
		</tr>
	</table>
	<br>
	<table border="0" style="width:90%;" align="center">
		<tr>
			<td style="text-align:center;" colspan="3">Cimahi, <?=date("d-M-Y")?></td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td id="ttd">
				<strong>Ketua Pelaksana</strong>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<i>Ujang Ganteng</i>
			</td>
			<td>&nbsp;</td>
			<td id="ttd">
				<strong>Sekretaris</strong>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<i>Ujang Ganteng</i>
			</td>			
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td style="text-align:center;" colspan="3">Mengetahui, </td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td id="ttd">
				<strong>PKS Kesiswaan</strong>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<i>Ahmad Solihin. S,Pd.</i>
			</td>
			<td>&nbsp;</td>
			<td id="ttd">
				<strong>Pembina OSIS</strong>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<i>Siti Sofia Zukhro. S,Pd.</i>
			</td>			
		</tr>
		<tr>
			<td id="ttd">
			&nbsp;
			</td>
			<td style="text-align:center;">
			<strong>Kepala Sekolah</strong>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<i>Dra. Yeyen Ruswiyani. M,M.pd</i>
			</td>
			<td id="ttd">
			&nbsp;
			</td>			
		</tr>
	</table>
</body>
</html>