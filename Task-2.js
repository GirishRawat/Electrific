var random;
var words = [];
var words1 = [];
var fav = [];
var i=0;
var j=0;
var flag=0;
var current_fav;

var ref = new Firebase("https://electrific.firebaseio.com/");

// Attach an asynchronous callback to read the data at our posts reference
ref.on("child_added", function(snapshot, prevChildKey) {
  var newQuestion = snapshot.val();
  console.log("Option 1: " + newQuestion.O1);
  console.log("Option 2: " + newQuestion.O2);
  console.log("Option 3: " + newQuestion.O3);
  console.log("Option 4: " + newQuestion.O4);
  console.log("Question " + newQuestion.Question);
  console.log("Answer " + newQuestion.answer);

  words1[words1.length] = newQuestion;

});
      
$(document).ready(function(){
  $("button").click(function(){
    $("#word-area").text(random);
      RandomWord();
      $("#history-remove").remove();

      if(flag==0) {
        $("#fav-s").append("<span class='glyphicon glyphicon-heart'></span>");
        flag = 1;
      }
      $("#history-add").prepend(words1[i].Question+"<br>");
      current_fav=words[i];
      i++;
  });
});

$(document).ready(function () {
    $('.nav li a').click(function(e) {

        $('.nav li').removeClass('active');

        var $parent = $(this).parent();
        if (!$parent.hasClass('active')) {
            $parent.addClass('active');
        }
    });
});

$(document).ready(function(){
  $("#fav-s").click(function(){
    $("#fav-remove").remove();
    fav[fav.length] = current_fav;
    $("#fav-add").prepend(fav[j]+"<br>");
    j++;
  });
});

function RandomWord() {
  var requestStr = "http://randomword.setgetgo.com/get.php";
  $.ajax({
    type: "GET",
    url: requestStr,
    dataType: "jsonp",
    jsonpCallback: 'RandomWordComplete'
  });
}
      
RandomWord();
      
function RandomWordComplete(data){
  random = data.Word;
  words[words.length] = random;
  console.log(words.length);
}

