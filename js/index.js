$(document).ready(function(){
   var datatable = new DataTable(document.querySelector('#first-datatable-output table'), {
    pageSize: 10,
    sort: [false, false, false, false, false],
    filters: [true, 'select', true, true, true],
    filterText: '...'
}); 
});
////$('.search').on('keyup', function() {
//  var value = $(this).val();
//  var patt = new RegExp(value, "i");
//
//$('.tblData').find('tr').each(function() {
//    if (!($(this).find('td').text().search(patt) >= 0)) {
//      $(this).not('#tbl-header').hide();
//    }
//    if (($(this).find('td').text().search(patt) >= 0)) {
//      $(this).show();
//    }
//  });
//});
//    $(document).ready(function(){
//            var totalRows = $('#tblData').find('tbody tr:has(td)').length;
//            var recordPerPage = 175;
//            var totalPages = Math.ceil(totalRows / recordPerPage);
//            var $pages = $('<div id="pages"></div>');
//            for (i = 0; i < totalPages; i++) {
//                $('<span>&nbsp;&nbsp;' + (i + 1) + '</span>').appendTo($pages);
//            }
//            $pages.appendTo('#tblData');
//            $('.pageNumber').hover(
//            function() { $(this).addClass('focus'); },
//            function() { $(this).removeClass('focus'); }
//            );
//            $('table').find('tbody tr:has(td)').hide();
//            var tr = $('table tbody tr:has(td)');
//            for (var i = 0; i <= recordPerPage - 1; i++) {
//            $(tr[i]).show();
//            }
//            $('span').click(function(event) {
//            $('#tblData').find('tbody tr:has(td)').hide();
//            $('.search').empty();
//            var nBegin = ($(this).text() - 1) * recordPerPage;
//            var nEnd = $(this).text() * recordPerPage - 1;
//            for (var i = nBegin; i <= nEnd; i++)
//            {
//            $(tr[i]).show();
//            }
//            });
//            $('.search').on('keyup',function(){
//            var searchTerm = $(this).val().toLowerCase();
//            $('#tblData tbody tr').each(function(){
//            var lineStr = $(this).text().toLowerCase();
//            if(lineStr.indexOf(searchTerm)===-1){
//            $(this).hide();
//            }else{
//            $(this).show();
//            }
//            });
//            $("button").click(function(){
//            $('#txt').val('');                     
//            });
//            });
//            });
//
// 
//});
//$('#search').on("keyup", function() {
//  $('table.paginated').trigger('repaginate');
//});
//
//$('table.paginated').each(function() {
//  var currentPage = 0;
//  var numPerPage = 5;
//  var $table = $(this);
//  var $pager = $('<div class="pager"></div>');
//  var $previous = $('<span class="previous"><<</spnan>');
//  var $next = $('<span class="next">>></spnan>');
//
//  $pager.insertBefore($table).find('span.page-number:first').addClass('active');
//
//  $table.bind('repaginate', function() {
//    $table.find('tbody tr').hide();
//
//    $filteredRows = $table.find('tbody tr').filter(function(i, tr) {
//      return $('#search').val() !== "" ? $(tr).find("td").get().map(function(td) {
//        return $(td).text();
//      }).filter(function(td){
//      	return td.indexOf($('#search').val()) !== -1; 
//      }).length > 0 : true;
//    });
//
//    $filteredRows.slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
//
//    var numRows = $filteredRows.length;
//    var numPages = Math.ceil(numRows / numPerPage);
//		
//    $pager.find('.page-number, .previous, .next').remove();
//    for (var page = 0; page < numPages; page++) {
//      var $newPage = $('<span class="page-number"></span>').text(page + 1).bind('click', {
//        newPage: page
//      }, function(event) {
//        currentPage = event.data['newPage'];
//        $table.trigger('repaginate');
//      });
//      if(page === currentPage){
//      	$newPage.addClass('clickable active');
//     	}else{
//      	$newPage.addClass('clickable');
//      }
//      $newPage.appendTo($pager);
//    }
//    
//    $previous.insertBefore('span.page-number:first');
//    $next.insertAfter('span.page-number:last');
//
//    $next.click(function(e) {
//      $previous.addClass('clickable');
//      $pager.find('.active').next('.page-number.clickable').click();
//    });
//    $previous.click(function(e) {
//      $next.addClass('clickable');
//      $pager.find('.active').prev('.page-number.clickable').click();
//    });
//
//    $next.addClass('clickable');
//    $previous.addClass('clickable');
//
//    setTimeout(function() {
//      var $active = $pager.find('.page-number.active');
//      if ($active.next('.page-number.clickable').length === 0) {
//        $next.removeClass('clickable');
//      } else if ($active.prev('.page-number.clickable').length === 0) {
//        $previous.removeClass('clickable');
//      }
//    });
//  });
//  $table.trigger('repaginate');
//});
//$('.example-table').datatable({
//    pageSize: 100,
//    sort: [true, true, true, true, true],
//    filters: [true, true, true, true, true],
//    filterText: 'What are you looking for?',
//    onChange: function(old_page, new_page){
//      console.log('changed from ' + old_page + ' to ' + new_page);
//    }
//});
