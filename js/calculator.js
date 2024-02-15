function Cvalue()
{
 // missing relevant digits

 var fromR, toR, resultV, nVal;

 fromR = rate[document.calcForm.from.selectedIndex];
 toR = rate[document.calcForm.to.selectedIndex];
 nVal = document.calcForm.inV.value;
if ( IsNumeric(nVal) == false ) {
 alert("amount to multiply is not a number\n\nyou can only use\n\n1234567890 and . (dot)");
 }

 resultV = nVal * ( toR / fromR );

 // 6 relevant digits only, or integer
 if ( (resultV == parseInt(resultV)) || (resultV > 99999) )
 {
 // mostly integer
 resultV = parseInt( resultV );
 }
 else
 {
 if (resultV > 1)
 {
 resultV = resultV.toString();
 resultV = resultV.substring(0,7);
 } else {
 resultV = resultV.toString();
 resultV = resultV.substring(0,8);
 }
 }


 document.calcForm.outV.value = " " + comma(resultV) + " " + currency[document.calcForm.to.selectedIndex];
}

function invertCurr()
{
 var i;
 i = document.calcForm.from.selectedIndex;
 document.calcForm.from.selectedIndex = document.calcForm.to.selectedIndex;
 document.calcForm.to.selectedIndex = i;
 changeFlag('from');
 changeFlag('to');
 Cvalue();
}

function comma(num)
{
 var n = Math.floor(num);
 var myNum = num + "";
 var myDec = ""

 if (myNum.indexOf('.',0) > -1){
 myDec = myNum.substring(myNum.indexOf('.',0),myNum.length);
 }
 var arr=new Array('0'), i=0;
 while (n>0)
 {arr[i]=''+n%1000; n=Math.floor(n/1000); i++;}
 arr=arr.reverse();
 for (var i in arr) if (i>0) //padding zeros
 while (arr[i].length<3) arr[i]='0'+arr[i];
 return arr.join() + myDec;
}

function IsNumeric(strString)
{
 var strValidChars = "0123456789.";
var strChar;
var blnResult = true;

for (i = 0; i < strString.length && blnResult == true; i++)
{
strChar = strString.charAt(i);
if (strValidChars.indexOf(strChar) == -1)
{
blnResult = false;
}
}
return blnResult;
}