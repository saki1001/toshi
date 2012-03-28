function MM_showHideLayersTop() { //v9.0
  var i,p,v,obj,args=MM_showHideLayersTop.arguments;
  for (i=0; i<(args.length-2); i+=3) 
  with (document) if (getElementById && ((obj=getElementById(args[i]))!=null)) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
function trim123(stringToTrim) {return stringToTrim.replace(/^\s+|\s+$/g,"");}