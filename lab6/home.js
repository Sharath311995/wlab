function startMoving() {
    if(mover.offsetLeft+mover.offsetWidth>0)
    {
        mover.style.left=mover.offsetLeft-1+"px";
        move_var=setTimeout(startMoving,10,mover);
    }
    else
    {
        mover.style.left=window.innerWidth+"px";
        move_var=setTimeout(startMoving,10,mover);
    }
}

function fetch() {
    xhr.open("GET","server.php");       //Just set header("content-type: text/xml") and echo the file
    xhr.send();
}
/**
 * Created by KAI on 10-Sep-16.
 */
function init()
{
    move_var="";
    mover=document.getElementById("content");
    set_initial(mover);
    console.log("here");

    xhr=new XMLHttpRequest();
    xhr.onreadystatechange=populate;
    setTimeout(fetch,5000);

}
function populate()
{
    console.log(this.readyState);
    if(this.readyState==4 && this.status==200)
    {
        resp=this.responseXML;
        var root = resp.documentElement;
        items=root.getElementsByTagName("item");
        mover.innerHTML="";
        for(var i=0;i<5;i++)
        {
            item=items[i];
            console.log(item);
            var title = item.getElementsByTagName("title")[0].firstChild.nodeValue;
            var link = item.getElementsByTagName("link")[0].firstChild.nodeValue;
            console.log(title+":"+link);
            var one = document.createElement("a");
            one.href=link;
            one.innerHTML=title;
            mover.appendChild(one);
        }
        setTimeout(fetch,5000);
    }
}
function set_initial(mover)
{
    mover.style.left=window.innerWidth+"px";
    console.log("here");
    startMoving();
}