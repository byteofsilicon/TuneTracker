
/**
 * First we will load all of this project's JavaScript dependencies which
 * include Vue and Vue Resource. This gives a great starting point for
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(document).ready(function() {

    // Bands
    $('#bandsTable').tablesorter();
    $('#bandsAlbumList').select2();

    // albums
    $('#albumsTable').tablesorter();
    $('#albumsBandList').select2();
    $('#albumBandFilter').select2();
    $('#albumBandFilter').on('change', function(event) {
          var url = $(this).val();
          if (url) {
              window.location.href = url
          }
          return false;
    });

    // Generic
    $('.delete-btn').click(function(event) {
        event.preventDefault();
        if ( ! confirm('Are you sure?')) {
            return false;
        }

        var action = $(this).attr('href');
        var parent = $(this).parent();

        $.ajax({
            type: 'delete',
            url: action
        })
        .done(function() {
            parent.closest("tr").remove();
        })
        .fail(function(msg) {
            alert(msg.responseJSON[0]);
        });
    });
});
