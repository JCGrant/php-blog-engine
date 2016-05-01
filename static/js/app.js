datetimes = document.getElementsByClassName('datetime');
Array.prototype.forEach.call(datetimes, function(datetime) {
  time_str = datetime.innerHTML;
  date = new Date(time_str);
  datetime.innerHTML = date.toDateString();
});
