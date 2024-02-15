<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="css/styles.css" type="text/css" />

<script src="js/calculator.js" language="javaScript"></script>

<script language="JavaScript">

var currency = new Array("USD","ARS","AUD","BWP","BRL","GBP","BND","BGN","CAD","CLP","CNY","COP","HRK","DKK","EEK","EUR","HKD","HUF","ISK","INR","ILS","JPY","KZT","KWD","LVL","LYD","LTL","MYR","MTL","MXN","NPR","NZD","NOK","OMR","PKR","QAR","RON","RUB","SAR","SGD","ZAR","KRW","LKR","SEK","CHF","TWD","THB","TTD","TRY","VEF");
var country = new Array("US","AR","AU","BW","BR","GB","BN","BG","CA","CL","CN","CO","HR","DK","EE","EU","HK","HU","IS","IN","IL","JP","KZ","KW","LV","LY","LT","MY","MT","MX","NP","NZ","NO","OM","PK","QA","RO","RU","SA","SG","ZA","KR","LK","SE","CH","TW","TH","TT","TR","VE");
var rate = new Array("1","3.61725","1.56826","8.07754","2.38027","0.699706","1.5343","1.55333","1.26368","622.691","6.83719","2591.12","5.93487","5.917","12.4268","0.794218","7.75403","241.8","113.391","49.6251","4.1499","94.2102","149","0.29195","0.560956","1.93237","2.74228","3.67651","2.93291","14.77","79.65","1.98213","6.94901","0.3845","80.083","3.64","3.40322","36.1897","3.75","1.53753","10.1978","1511.93","114.217","8.79422","1.18505","34.8071","35.735","5.85481","1.71432","2.14743");

var fromFlag = new Array(0,5,2,15,39,21);
var toFlag   = new Array(15,5,21,19,2,39);

</script>

<title>My PHP Site | Currency </title>

</head>

<body>

<table width="100%">

    <tr align="center" valign="top" style="font-size:42px" height="100px">
    
        <td colspan="3"><span class="style2">Mac's PHP Site</span></td>
  </tr>

	<tr valign="top" align="left">
    
    	<td width="23%" align="left" valign="top">
        
        
 <div id="menu">
  <ul>
  
    <li><a href="index.php">Home</a></li>
             <li><a href="calculator.php">Addition app</a></li>
            <li><a href="currency.php">Currency conversion</a></li>
            <li><a href="bmicalculator.php">BMI Calc</a></li>
            <li><a href="recipe.php">Recipe calc</a></li>
            <li><a href="contact.php">Contact form</a></li>
            <li><a href="galery.php">Galery</a></li>
            <li><a href="game.php">Game</a></li>
            <li><a href="tipafriend.php">Tip-a-friend</a></li>


  </ul>
</div>

   
      </td>
        <td width="75%" align="left" valign="top">
        
        
        
        
        <form name="calcForm">
            <table border=1 cellpadding=0 cellspacing=0><tr><td>
            
            <table width=230 border=0 cellpadding=1 cellspacing=0 ><tr><td valign="top">
            <table width=100% border=0 cellpadding=1 cellspacing=0 >
            <tr>
            <td bgcolor= align=center valign=middle><input type="Text" size=23 name="outV" value="" onFocus="blur()"></td>
            <td ></td>
            
            </tr>
            <tr>
            <td  align=center colspan=2>
            <font face="Verdana" SIZE="-2" COLOR=#999999>&nbsp;<br>convert</font><br>
            <SELECT NAME="from" SIZE="1" onChange="Cvalue(); changeFlag('from');">
                <OPTION VALUE="0">American Dollar</OPTION>
                <OPTION VALUE="1">Argentine Peso</OPTION>
                <OPTION VALUE="2">Australian Dollar</OPTION>
                <OPTION VALUE="3">Botswana Pula</OPTION>
            
                <OPTION VALUE="4">Brazilian Real</OPTION>
                <OPTION VALUE="5">British Pound</OPTION>
                <OPTION VALUE="6">Brunei dollar</OPTION>
                <OPTION VALUE="7">Bulgarian Lev</OPTION>
                <OPTION VALUE="8">Canadian Dollar</OPTION>
                <OPTION VALUE="9">Chilean Peso</OPTION>
            
                <OPTION VALUE="10">Chinese Yuan</OPTION>
                <OPTION VALUE="11">Colombian Peso</OPTION>
                <OPTION VALUE="12">Croatian Kuna</OPTION>
                <OPTION VALUE="13">Danish Krone</OPTION>
                <OPTION VALUE="14">Estonian Kroon</OPTION>
                <OPTION VALUE="15">Euro</OPTION>
            
                <OPTION VALUE="16">Hong Kong Dollar</OPTION>
                <OPTION VALUE="17">Hungarian Forint</OPTION>
                <OPTION VALUE="18">Iceland Krona</OPTION>
                <OPTION VALUE="19">Indian Rupee</OPTION>
                <OPTION VALUE="20">Israeli New Shekel</OPTION>
                <OPTION VALUE="21">Japanese Yen</OPTION>
            
                <OPTION VALUE="22">Kazakhstani Tenge</OPTION>
                <OPTION VALUE="23">Kuwaiti Dinar</OPTION>
                <OPTION VALUE="24">Latvian Lat</OPTION>
                <OPTION VALUE="25">Libyan Dinar</OPTION>
                <OPTION VALUE="26">Lithuanian Litas</OPTION>
                <OPTION VALUE="27">Malaysian Ringgit</OPTION>
            
                <OPTION VALUE="28">Maltese Lira</OPTION>
                <OPTION VALUE="29">Mexican Peso</OPTION>
                <OPTION VALUE="30">Nepalese Rupee</OPTION>
                <OPTION VALUE="31">New Zealand Dollar</OPTION>
                <OPTION VALUE="32">Norwegian Kroner</OPTION>
                <OPTION VALUE="33">Omani Rial</OPTION>
            
                <OPTION VALUE="34">Pakistan Rupee</OPTION>
                <OPTION VALUE="35">Qatari Rial</OPTION>
                <OPTION VALUE="36">Romanian Leu</OPTION>
                <OPTION VALUE="37">Russian Ruble</OPTION>
                <OPTION VALUE="38">Saudi Riyal</OPTION>
                <OPTION VALUE="39">Singapore Dollar</OPTION>
            
                <OPTION VALUE="40">South African Rand</OPTION>
                <OPTION VALUE="41">South Korean Won</OPTION>
                <OPTION VALUE="42">Sri Lanka Rupee</OPTION>
                <OPTION VALUE="43">Swedish Krona</OPTION>
                <OPTION VALUE="44">Swiss Franc</OPTION>
                <OPTION VALUE="45">Taiwan Dollar</OPTION>
            
                <OPTION VALUE="46">Thai Baht</OPTION>
                <OPTION VALUE="47">Trinidad/Tobago Dollar</OPTION>
                <OPTION VALUE="48">Turkish Lira</OPTION>
                <OPTION VALUE="49">Venezuelan Bolivar</OPTION>
            
            </SELECT>
            <font face="Verdana" SIZE="-2" COLOR=#999999><br><br>into</font><br>
            <SELECT NAME="to" SIZE=1 onChange="Cvalue(); changeFlag('to');">
            
                <OPTION VALUE="0">American Dollar</OPTION>
                <OPTION VALUE="1">Argentine Peso</OPTION>
                <OPTION VALUE="2">Australian Dollar</OPTION>
                <OPTION VALUE="3">Botswana Pula</OPTION>
                <OPTION VALUE="4">Brazilian Real</OPTION>
                <OPTION VALUE="5">British Pound</OPTION>
            
                <OPTION VALUE="6">Brunei dollar</OPTION>
                <OPTION VALUE="7">Bulgarian Lev</OPTION>
                <OPTION VALUE="8">Canadian Dollar</OPTION>
                <OPTION VALUE="9">Chilean Peso</OPTION>
                <OPTION VALUE="10">Chinese Yuan</OPTION>
                <OPTION VALUE="11">Colombian Peso</OPTION>
            
                <OPTION VALUE="12">Croatian Kuna</OPTION>
                <OPTION VALUE="13">Danish Krone</OPTION>
                <OPTION VALUE="14">Estonian Kroon</OPTION>
                <OPTION VALUE="15">Euro</OPTION>
                <OPTION VALUE="16">Hong Kong Dollar</OPTION>
                <OPTION VALUE="17">Hungarian Forint</OPTION>
            
                <OPTION VALUE="18">Iceland Krona</OPTION>
                <OPTION VALUE="19">Indian Rupee</OPTION>
                <OPTION VALUE="20">Israeli New Shekel</OPTION>
                <OPTION VALUE="21">Japanese Yen</OPTION>
                <OPTION VALUE="22">Kazakhstani Tenge</OPTION>
                <OPTION VALUE="23">Kuwaiti Dinar</OPTION>
            
                <OPTION VALUE="24">Latvian Lat</OPTION>
                <OPTION VALUE="25">Libyan Dinar</OPTION>
                <OPTION VALUE="26">Lithuanian Litas</OPTION>
                <OPTION VALUE="27">Malaysian Ringgit</OPTION>
                <OPTION VALUE="28">Maltese Lira</OPTION>
                <OPTION VALUE="29">Mexican Peso</OPTION>
            
                <OPTION VALUE="30">Nepalese Rupee</OPTION>
                <OPTION VALUE="31">New Zealand Dollar</OPTION>
                <OPTION VALUE="32">Norwegian Kroner</OPTION>
                <OPTION VALUE="33">Omani Rial</OPTION>
                <OPTION VALUE="34">Pakistan Rupee</OPTION>
                <OPTION VALUE="35">Qatari Rial</OPTION>
            
                <OPTION VALUE="36">Romanian Leu</OPTION>
                <OPTION VALUE="37">Russian Ruble</OPTION>
                <OPTION VALUE="38">Saudi Riyal</OPTION>
                <OPTION VALUE="39">Singapore Dollar</OPTION>
                <OPTION VALUE="40">South African Rand</OPTION>
                <OPTION VALUE="41">South Korean Won</OPTION>
            
                <OPTION VALUE="42">Sri Lanka Rupee</OPTION>
                <OPTION VALUE="43">Swedish Krona</OPTION>
                <OPTION VALUE="44">Swiss Franc</OPTION>
                <OPTION VALUE="45">Taiwan Dollar</OPTION>
                <OPTION VALUE="46">Thai Baht</OPTION>
                <OPTION VALUE="47">Trinidad/Tobago Dollar</OPTION>
            
                <OPTION VALUE="48">Turkish Lira</OPTION>
                <OPTION VALUE="49">Venezuelan Bolivar</OPTION>
            
            </SELECT>
            <font face="Verdana" SIZE="-2" COLOR=#999999><br><br>amount</font><br>
            <input type="text" size=20 name="inV" value="1" onChange="javascript:Cvalue();">
            <br><br>
            <Input TYPE="button" NAME="Calculate" VALUE="Calculate">
            <br>&nbsp;
           
            <tr><td bgcolor=#E7F1F8 colspan=2></td></tr>
            </table>
            
            </td></tr></table>
            
            </td>
            <td></td>
            
            </tr><tr>
            <td colspan=3><br>
            </td></tr></table>
          </form>
        
        
        
        
      </td>
        <td width="2%" align="left" valign="top"></td>
    </tr>
</table>



</body>
</html>
