<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta http-equiv="content-language" content="en"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<title>Sprawdzanie wymaga� przez Yii</title>
</head>

<body>
<div id="page">

<div id="header">
<h1>Sprawdzanie wymaga� stawianych przez Yii</h1>
</div><!-- header-->

<div id="content">
<h2>Opis</h2>
<p>
Skrypt ten sprawdza czy konfiguracja twojego serwera spe�nia wymagania
pozwalaj�ce uruchomi� aplikacj� napisan� przy u�yciu <a href="http://www.yiiframework.com/">Yii</a>.
Sprawdza on, czy serwej u�ywa poprawnej wersji PHP,
czy zosta�y za�adowane odpowiednie rozszerzenia PHP oraz czy ustawienia w pliku plik php.ini s� prawid�owe.
</p>

<h2>Rozstrzygni�cie</h2>
<p>
<?php if($result>0): ?>
Gratulacje! Konfiguracja Twojego serwera spe�nia wszystkie wymagania stawiane przez Yii.
<?php elseif($result<0): ?>
Konfiguracja Twojego serwera spe�nia minimalne qymagania stawiane przez Yii.
Zwr�� uwag� na ostrze�enia wy�wietlone poni�ej je�li Twoja aplikacja b�dzie u�ywa�a odpowiadaj�ce im funkcjonalno�ci.
<?php else: ?>
Niestety konfiguracja Twojego serwera nie spe�nia wymaga� stawianych przez Yii.
<?php endif; ?>
</p>

<h2>Szczeg�y</h2>

<table class="result">
<tr><th>Nazwa</th><th>Rezultat</th><th>Wymagana przez</th><th>Notka</th></tr>
<?php foreach($requirements as $requirement): ?>
<tr>
	<td>
	<?php echo $requirement[0]; ?>
	</td>
	<td class="<?php echo $requirement[2] ? 'passed' : ($requirement[1] ? 'failed' : 'warning'); ?>">
	<?php echo $requirement[2] ? 'Passed' : 'Failed'; ?>
	</td>
	<td>
	<?php echo $requirement[3]; ?>
	</td>
	<td>
	<?php echo $requirement[4]; ?>
	</td>
</tr>
<?php endforeach; ?>
</table>

<table>
<tr>
<td class="passed">&nbsp;</td><td>powi�d� si�</td>
<td class="failed">&nbsp;</td><td>nie powi�d� si�</td>
<td class="warning">&nbsp;</td><td>ostrze�enie</td>
</tr>
</table>

</div><!-- content -->

<div id="footer">
<?php echo $serverInfo; ?>
</div><!-- footer -->

</div><!-- page -->
</body>
</html>