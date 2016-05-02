datetimes = document.getElementsByClassName('datetime');
Array.prototype.forEach.call(datetimes, function(datetime) {
  time_str = datetime.innerHTML;
  date = new Date(time_str);
  datetime.innerHTML = date.toDateString();
});

var posts = document.getElementsByClassName('post');
Array.prototype.forEach.call(posts, function(post) {
  var content = post.getElementsByClassName('content')[0];
  var paragraphs = content.innerHTML.split('\n\n');
  var formatted_html = '';
  paragraphs.forEach(function(paragraph) {
    formatted_html += '<p>' + paragraph + '</p>';
  });
  content.innerHTML = formatted_html;
});
