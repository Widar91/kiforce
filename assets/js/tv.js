function listVideos(data, elem) {
  var items = data.items;
  var myOutput = '<div class=\"row\">';
  for (var i=0; i<data.items.length; i++) {
    
    var videoId = items[i].snippet.resourceId.videoId;
    var videoTitle = items[i].snippet.title;
    var videoThumbnail = items[i].snippet.thumbnails.medium.url;

    if (videoTitle.length > 37) {
        videoTitle = videoTitle.substring(0,34) + '...';
    }

    myOutput += '\
    <div class=\"col-lg-4 col-md-4 col-sm-6 col-xs-12 video-item videoFrame\">\
            <a href=\"https://www.youtube.com/watch?v='+videoId+'\">\
                <div class=\"playFrame\ text-center">\
                    <img class=\"img-responsive playThumb\" src=\"'+videoThumbnail+'\" alt=\"\" />\
                    <img class=\"img-responsive playButton\" src=\"assets/images/playButton.png\" alt=\"\" />\
                    <div class=\"playCaption\">\
                            <p class=\"playCaptionParagraph\">'+videoTitle+'</p>\
                    </div>\
                </div>\
            </a>\
    </div>'

  }
  myOutput += '</div>';
  document.getElementById(elem).innerHTML = myOutput;
  
}

function makeURL(playlist_id) {
    return 'https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=12&playlistId='+playlist_id+'&key=AIzaSyChUuupv6HrDENlLjBAht2QAkxUjskg_CY';
}

$.getJSON(makeURL('PLBa6jf9X3zRlRq8srktfcmPv2wPjtJzU-'), function(data) {
    listVideos(data, 'feature-1');
});
$.getJSON(makeURL('PLBa6jf9X3zRlt557FUIO_DD2ITsUb00yO'), function(data) {
    listVideos(data, 'feature-2');
});
$.getJSON(makeURL('PLBa6jf9X3zRkd6JAJjdRaZkhLRl6N80oh'), function(data) {
    listVideos(data, 'feature-3');
});