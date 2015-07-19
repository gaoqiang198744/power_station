<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>

    <div class="n-container" style="padding-left:20px;">

      <div class="n-right-content">
        <h4 class="tab-to-title">基站列表<a href="/base/create"  style="margin-left:20px;" class="btn btn-primary">创建基站</a></h4>
        <div class="n-check-area" style="border:1px solid #eee;">
          <div class="n-check-item">
            <span class="name">项目</span>
            <select id="station_project"><option>--查询条件--</option></select>
          </div>
          <br/>
          <div class="n-check-item">
            <span class="name">省</span>
            <select id="province"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">城市</span>
            <select id="city"><option value="0">--查询条件--</option></select>
          </div>
          <div class="n-check-item">
            <span class="name">县区</span>
            <select id="distirct"><option value="0">--查询条件--</option></select>
          </div>
          <br/>
          <div class="n-check-item">
            <span class="name">站型</span>
            <select><option value="0">--查询条件--</option>
			<option value="1">基准站</option>
            <option value="2">节能站</option>
            <option value="3">预备站</option>
			</select>
          </div>
          <div class="n-check-item">
            <span class="name">负载</span>
            <select><option>--查询条件--</option></select>
          </div>
          <br/>
          <button type="button" class="btn btn-default">确定</button>
        </div>

        <div class="tl-r">
          <ul class="pagination">
            <li>
              <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
              </a>
            </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li>
              <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
              </a>
            </li>
          </ul>
        </div>

        <table class="table table-bordered table-striped" role="grid">
          <thead>
            <tr>
              <th>站点编号</th>
              <th>站点名称</th>
              <th>城市</th>
              <th>区域</th>
              <th>负载功率</th>
              <th>砖墙/板房</th>
              <th>基准站</th>
            </tr>
          </thead>
          <tbody id="container">
                 
          </tbody>
        </table>

      </div>

    </div>

  </div>
  <script>
var selProvince = $('#province');
var selCity = $('#city');
var selDistirct = $('#distirct');
$get('/address/province',{},function(d){
	var data = d.data;
	var html = '<option value="0">--查询条件--</option>';
	for (var i=0;i<data.length;i++){
		html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
	}
	selProvince.html(html);
});

$get('/project/list',{
	},function(d){
	   var data = d.data;
	   var html = '';
	   for(var i=0;i<data.length;i++){
	      html += '<option value="'+data[i].id+'">'+data[i].projectName+'</option>';
	   }
	   $('#station_project').html(html);
});

$get('/station/list',{
		start:0,
		end:15
	},function(d){
		var data = d.data;
		var html = '';
		for (var i=0;i<data.length;i++){
			var _d = data[i];
			html += '<tr>\
					  <td class="sorting_1"><a href="/base/info/'+_d.stationId+'">'+_d.stationId+'</a></td>\
					  <td>'+_d.stationName+'</td>\
					  <td>'+_d.stationProvince+'</td>\
					  <td>'+_d.stationDistirct+'</td>\
					  <td>12..6A</td>\
					  <td>砖墙</td>\
					  <td>是</td>\
					</tr>';
		}
		$('#container').html(html);
	   
});

selProvince.change(function(){
	$get('/address/city',{
		province:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">--查询条件--</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selCity.html(html);
	});
});

selCity.change(function(){
	$get('/address/district',{
		province:selProvince.val(),
		city:$(this).val()
	},function(d){
		var data = d.data;
		var html = '<option value="0">--查询条件--</option>';
		for (var i=0;i<data.length;i++){
			html += '<option value="'+data[i].code+'">'+data[i].name+'</option>';
		}
		selDistirct.html(html);
	});
});

  </script>
</body>
</html>