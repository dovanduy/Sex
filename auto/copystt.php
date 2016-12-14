<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Auto Copy Status</h4>
</div>
<div class="panel-body" id="back">
	<div class="inqbox float-e-margins">
		<div class="inqbox-content">
			<font style="color:#23c6c8;">Bước 1:</font> Sử Dụng Mục Bên " Danh Sách Bạn Bè" Để Copy ID Bạn Bè Của Bạn.  <br />
			<font style="color:#23c6c8;">Bước 2:</font> Nhập ID Vào Khung Bên Dưới Sau Đó Thực Hiện Copy Stt. <br />
			<hr>
			<div class="alert alert-info" id="star" style="display: none;">
				<div id="message"></div>
			</div>
			<div class="input-prepend input-group ">
				<span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
					<input name="id" type="text" id="id" class="form-control" placeholder="Nhập ID Trang Cá Nhân Cần Copy"><span class="input-group-addon"><i class="fa fa-paste"></i>
				</span>
				<input type="hidden" name="_SERVER" id="_SERVER" value="<? echo $_SESSION['_SERVER']; ?>">
			</div><br />
			<input class="form-control" type="hidden" name="token" id="token" value="<?php echo $_SESSION['token'];?>" />
			<div class="form-group">
				<label for="name">Chọn Số Lượng Status Cần Copy - Kéo Thanh Trượt Để Điều Chỉnh</label>
				<center>
					<div id="soluong" class="label label-info" align="center">1</div>
				</center>
				<input class="form-control" type="range" name="soluong" min="1" max="20" id="limit" value="1" onchange="document.getElementById('soluong').innerHTML=this.value;">
			</div>
			<div class="form-group">
				<button class="btn btn-success btn-block" id="copystt" onclick="auto_copystt();">
					<i class="fa fa-exchange"></i> Copy Status
				</button>
			</div>
		</div>
		<div class="inqbox-footer">
		</div>
	</div>
</div>

</div></div>
<div class="col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h4 class="panel-title">Danh Sách Bạn Bè</h4>
</div>
	<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Tên</th>
						<th>ID Profile</th>
						<th>Thao Tác</th>
					</tr>
				</thead>
				<tbody id="friend">
					<tr>
						<td colspan="4"><br /><center><a href="#" onclick="loadfr();">TẢI DANH SÁCH BẠN BÈ</a></center></td>
					</tr>
				</tbody>
</table>
</div></div></div>

<script type="text/javascript"> 
function auto_copystt() {
    ids = document.getElementById('id').value;
    server = document.getElementById('_SERVER').value;
    tokens = document.getElementById('token').value;
    autos = 'copystt';
    limits = document.getElementById('limit').value;
    document.getElementById("copystt").disabled = true;
    $("#copystt").html('<i class="fa fa-refresh fa-spin"></i> Đang Tiến Hành');
    $("#message").html("");
    $('#star').show();
    log('<i class="fa fa-spinner fa-pulse"></i> Quá Trình Copy Status Đang Diễn Ra, Vui Lòng Đợi ... ')
    $.post('done/post_auto.php', {
        id: ids,
        token: tokens,
        limit: limits,
         _SERVER: server,
        auto: autos
    }, function(data, status) {
        log(data);
        $("#copystt").html('<i class="fa fa-exchange"></i> Thực Thi');
        document.getElementById("copystt").disabled = false;
    });
}
</script> 