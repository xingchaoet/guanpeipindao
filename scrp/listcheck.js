 function HtmlEncode(text){
  return text.replace(/&/g, '&amp').replace(/\"/g, '"').replace(/</g, '&lt;').replace(/>/g, '&gt;');
 }
 function _checkbox(name,str,defv){
  var arr=str.split("^");
  var ck="",bc="";
  for(var i=0;i<arr.length;i++){
   var thisarr=arr[i].split("@=");
   if (thisarr[0].length>0){
    var t=(thisarr.length==2)?thisarr[0]:arr[i];
    var v=(thisarr.length==2)?thisarr[1]:arr[i];
    if((","+HtmlEncode(defv).toLowerCase()+",").replace(/ ,/g, ',').indexOf(","+v+",")!=-1){ck=" checked";cls="cked";}
    else{ck="";cls="nock";}
    var thisstr="<label class=\""+cls+"\" for=\"i_"+name+"_"+i+"\" id=\"l_"+name+"_"+i+"\">";
    thisstr+="<input class=\"checkbox\" onpropertychange=\"document.getElementByIdx_x('l_"+name+"_"+i+"').className=(document.getElementByIdx_x('i_"+name+"_"+i+"').checked)?'cked':'nock';\" onclick=\"document.getElementByIdx_x('l_"+name+"_"+i+"').className=(document.getElementByIdx_x('i_"+name+"_"+i+"').checked)?'cked':'nock';\" type=\"checkbox\""+ck+" name=\""+name+"\" id=\"i_"+name+"_"+i+"\" value=\""+HtmlEncode(v)+"\" \/> ";
    thisstr+=HtmlEncode(t)+"</label>";
    document.write(thisstr);
   }
  }
 }
 function _getv(o){
  var allvalue="";
  if(typeof(o)=="undefined"){return "";}
  if (typeof(o.length)=="undefined"){
   if(o.checked){return o.value+ ",";}else{return "";}
  }
  for(var i=0;i<o.length;i++){
   if(o[i].checked){
    allvalue +=o[i].value+",";
   }
  }
  return allvalue;
 }
 function _setv(o,defv){
  var allvalue=(","+HtmlEncode(defv).toLowerCase()+",").replace(/ ,/g, ',');
  for(var i=0;i<o.length;i++){
   var v = o[i].value;
   o[i].checked=(allvalue.indexOf(","+v+",")!=-1)
  }
  return allvalue;
 }
 function _sl(o,b){
  for(var i=0;i<o.length;i++){
   o[i].checked = b
   //if(o[i].checked!=b){o[i].click();}
  }
 }
