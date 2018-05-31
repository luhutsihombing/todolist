var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() 
  {
    var div = this.parentElement;
    div.style.display = "none";
    var inputValue = div.id;
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        var res1 = this.responseText;
      }
    };
    xhttp.open("GET", "site/delete?q="+inputValue, true);
    xhttp.send(); 
    
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') 
  {
    ev.target.classList.toggle('checked');
    
    var inputValue = ev.target.id;
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          var res1 = this.responseText;
        }
      };
      xhttp.open("GET", "site/update?q="+inputValue, true);
      xhttp.send(); 

  }
}, false);

// Create a new list item when clicking on the "Add" button
function newElement() 
{
  var inputValue = document.getElementById("myInput").value;
  var li = document.createElement("li");
  if (inputValue === '') {
    alert("todo list must write!");
  } else 
  {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
      if (this.readyState == 4 && this.status == 200) 
      {
        var res1 = this.responseText;
        
        li.setAttribute("id", res1);
        
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        document.getElementById("myUL").appendChild(li);
      }
    };
    xhttp.open("GET", "site/add?q="+inputValue, true);
    xhttp.send();   
    
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() 
    {
      var div = this.parentElement;
      div.style.display = "none";
      var inputValue = div.id;
      var xhttp;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() 
      {
        if (this.readyState == 4 && this.status == 200) 
        {
          var res1 = this.responseText;
        }
      };
      xhttp.open("GET", "site/delete?q="+inputValue, true);
      xhttp.send(); 
    }
  }
}
