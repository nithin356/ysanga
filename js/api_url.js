const API_URL = "";
$(document).ready(function () {
  if (window.location.href.indexOf("franky") > -1) {
    API_URL =
      "http://yuvaksangabackend-env.eba-p5tp78ge.us-west-2.elasticbeanstalk.com/backend/";
  } else {
    API_URL = "http://localhost/ysanga/backend/";
  }
});
