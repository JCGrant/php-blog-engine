function formatPostContent(content) {
  var paragraphs = content.innerHTML.split('\n\n');
  var formatted_html = '';
  paragraphs.forEach(function(paragraph) {
    formatted_html += '<p>' + paragraph + '</p>';
  });
  content.innerHTML = formatted_html;
}

function formatPostDatetime(datetime) {
  date = new Date(datetime.innerHTML);
  datetime.innerHTML = date.toDateString();
}

var posts = document.getElementsByClassName('post');
Array.prototype.forEach.call(posts, function(post) {
  var content = post.getElementsByClassName('content')[0];
  formatPostContent(content);

  var datetime = post.getElementsByClassName('datetime')[0];
  formatPostDatetime(datetime);

  post.hidden = false;
});
