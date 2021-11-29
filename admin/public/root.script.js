/*
  Root Javascript File for Framework 3
  Created By Reggie @ Orcons Systems
  Date: 17-12-2019
*/


function push(params) {
  document.getElementById("class_call").value = params.class;
  document.getElementById("keys").value = params.keys;
  document.getElementById("view").value = params.view;
  document.getElementById("viewpage").value = params.viewpage;
  document.myform.submit();
}//---> Function to route to pages in a module. accepts json eg.{'view':'add'}


function pop() {
  document.getElementById("view").value = "";
  document.myform.submit();
}//---> Function to route back to lists page

function popTo(params) {
  document.getElementById("view").value = params.view;
  document.myform.submit();
}//---> Function to route to a specific page


