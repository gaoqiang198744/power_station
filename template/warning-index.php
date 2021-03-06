<!DOCTYPE html>
<html>
 <?php include ('include/head_script.php')?>
<body>
  <div class="n-layout">
    <?php include ('include/header.php')?>
    <div class="n-container">

      <div class="n-nav-left">
        <ul>
          <li class="title"><a href=""><span class="vl-m title">告警监控</span><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a></li>
          <li><a href="gaojing-celue.html"><span class="glyphicon glyphicon-cloud" aria-hidden="true"></span><span class="vl-m">告警策略管理</span></a></li>

        </ul>
      </div>

<style type="text/css">
.n-check-item{width: auto; margin-right: 20px;}
.n-check-item .name{width: auto;}

.data-name p,
.data-data p{height: 20px; margin-bottom: 4px;}
</style>
      <div class="n-right-content">
        <h4 class="tab-to-title">故障列表</h4>
        <div class="n-check-area">
          <div class="n-check-item">
            <select><option>2015</option></select>
            <span class="name">年</span>
          </div>
          <div class="n-check-item">
            <select><option>06</option></select>
            <span class="name">月</span>
          </div>
          <div class="n-check-item">
            <span class="name">告警状态</span>
            <select>
              <option>open</option>
              <option>close</option>
            </select>
          </div>
          <div class="n-check-item">
            <span class="name">告警类型</span>
            <select>
              <option>远程关站</option>
              <option>室内高温</option>
              <option>全部</option>
            </select>
          </div>
          <button type="button" class="btn btn-default">确定</button>
        </div>


        <table class="table table-bordered">
          <thead>
            <tr>
              <th>告警开始时间</th>
              <th>告警结束时间</th>
              <th>站点</th>
              <th>告警类型</th>
              <th>参数值</th>
              <th>告警状态</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhan-yuanshi-data.html">鹤东</a></td>
              <td>
                <div class="data-name">
                  <p>断站</p>
                  <p>室内高温</p>
                  <p>恒温柜高温</p>
                  <p>电表故障</p>
                  <p>功率异常</p>
                  <p>远程关站</p>
                  <p>代理维护按钮</p>
                  <p>空调故障</p>
                  <p>温度感应故障</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p></p>
                  <p>38</p>
                  <p>32</p>
                  <p>无总能耗／无DC能耗／总能耗小于DC</p>
                  <p></p>
                  <p></p>
                  <p>被打开</p>
                  <p>23</p>
                  <p>无数据／过低／过高</p>

                </div>
              </td>
              <td>open / close</td>
            </tr>

            <tr>
              <td></td>
              <td></td>
              <td><a href="jizhan-yuanshi-data.html">鹤南</a></td>
              <td>
                <div class="data-name">
                  <p>断站</p>
                  <p>室内高温</p>
                  <p>恒温柜高温</p>
                  <p>电表故障</p>
                  <p>功率异常</p>
                  <p>远程关站</p>
                  <p>代理维护按钮</p>
                  <p>空调故障</p>
                  <p>温度感应故障</p>
                </div>
              </td>
              <td>
                <div class="data-data">
                  <p></p>
                  <p>38</p>
                  <p>32</p>
                  <p>无总能耗／无DC能耗／总能耗小于DC</p>
                  <p></p>
                  <p></p>
                  <p>被打开</p>
                  <p>23</p>
                  <p>无数据／过低／过高</p>

                </div>
              </td>
              <td>open / close</td>
            </tr>
          </tbody>
        </table>



        <div class="tl-r">
          <p style="color:#ff4400;">页面提示：这里不知道要不要显示分页</p>
          <p>每页显示15条信息，查看更多请翻页。</p>
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

      </div>

    </div>

  </div>
</body>
</html>
