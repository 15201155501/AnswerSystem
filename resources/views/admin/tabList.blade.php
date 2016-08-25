
           <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>
                            <th class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </th>
                            <th>学生姓名</th>
                            <th>试卷名称</th>
                            <th>考试成绩</th>
                            <th>试卷提交时间</th>
                            <th>
                              <i class="icon-time bigger-110 hidden-480"></i>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach($arr['data'] as $v)
                          <tr>
                            <td class="center">
                              <label>
                                <input type="checkbox" class="ace" />
                                <span class="lbl"></span>
                              </label>
                            </td>
                            <td>
                              <a href="#">{{$v['stu_name']}}</a>
                            </td>
                            <td>{{$v['his_name']}}</td>
                            <td>{{$v['point']}}</td>
                            <td>{{$v['addtime']}}</td>
                            <td>
                                <button class="btn" class="zc" onclick="zc({{$v['his_id']}})">考试详细信息</button>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div id="mark">
                        <div id='closezc'><a href='javascript:void(0)' onclick='funClose()'>关闭</a></div>
                        <div class="tabs"> 这里是要弹出来的内容！<br />
                        </div>
                      </div>
                      <table>
                        <tr>
                          <button class="btn btn-primary" onclick="funPage(1)">首页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['prev']}})">上一页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['next']}})">下一页</button>&nbsp;
                          <button class="btn btn-primary" onclick="funPage({{$arr['last']}})">尾页</button>&nbsp;
                          <!-- <td><a href="{{url('historyList')}}?page=1">首页</a>
                          <a href="{{url('historyList')}}?page={{$arr['prev']}}">上一页</a>
                          <a href="{{url('historyList')}}?page={{$arr['next']}}">下一页</a>
                          <a href="{{url('historyList')}}?page={{$arr['last']}}">尾页</a></td> -->
                        </tr>
                      </table>