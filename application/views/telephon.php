<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html dir="ltr" lang="en">
<head>
   <script type="text/javascript" src="<?=base_url();?>/assets/SendSms/jquery.js" ></script>
   <script type="text/javascript" src="<?=base_url();?>/assets/SendSms/jquery.maskedinput-1.2.2.js" ></script>


</head>
<body>
    <script type="text/javascript">
   jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#date').mask('99/99/9999');
      $('#phone').mask('+7 (999) 999-9999');
      $('#phoneext').mask("(999) 999-9999? x99999");
      $("#tin").mask("99-9999999");
      $("#ssn").mask("999-99-9999");
      $("#product").mask("a*-999-a999");
      $("#eyescript").mask("~9.99 ~9.99 999");
   });</script>
<table border="0">
<tbody>
<tr>
<td>Date</td>
<td><input id="date" type="text" tabindex="1" /></td>
<td>99/99/9999</td>
</tr>
<tr>
<td>Phone</td>
<td><input id="phone" type="text" tabindex="3" placeholder="+7 (___) ___-____" /></td>
<td>(999) 999-9999</td>
</tr>
<tr>
<td>Phone + Ext</td>
<td><input id="phoneext" type="text" tabindex="4" /></td>
<td>(999) 999-9999? x99999</td>
</tr>
<tr>
<td>Tax ID</td>
<td><input id="tin" type="text" tabindex="5" /></td>
<td>99-9999999</td>
</tr>
<tr>
<td>SSN</td>
<td><input id="ssn" type="text" tabindex="6" /></td>
<td>999-99-9999</td>
</tr>
<tr>
<td>Product Key</td>
<td><input id="product" type="text" tabindex="7" /></td>
<td>a*-999-a999</td>
</tr>
<tr>
<td>Eye Script</td>
<td><input id="eyescript" type="text" tabindex="8" /></td>
<td>~9.99 ~9.99 999</td>
</tr>
</tbody></table>


</body>
</html>
