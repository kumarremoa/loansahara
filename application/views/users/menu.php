<style type="text/css">
    
.list-group-item { padding : 10px 15px !important; }

</style>

<section class="content">
    <div class="col-xs-12">
        <?php          
            if(!empty($success_msg)){
                echo '<div class="alert alert-success">'.$success_msg.'</div>';
            }elseif(!empty($error_msg)){
                echo '<div class="alert alert-danger">'.$error_msg.'</div>';
            }

        ?>
        </div> 
<div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix"><h5 class="pull-left">Menu</h5>                            
                        </div>
                        <div class="panel-body" id="cont">
                            <ul id="myEditor" class="sortableLists list-group">
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="btnOut" type="button" class="btn btn-success"><i class="fa fa-cogs"></i> Output</button>
                        
                    </div>
                    <form action="" method="post">
                    <div class="form-group">
                        <textarea name="menuval" id="out" class="form-control" cols="50" rows="10"></textarea>
                        <?php echo form_error('menuval','<p class="text-danger">','</p>'); ?>
                    </div>
                    <div class="form-group">
                    <input type="submit" id="btnSave" name="btnSave" value="SAVE" class="btn btn-danger pull-right"></div>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-primary">   
                        <div class="panel-heading">Add / Edit Menu Item's</div>
                        <div class="panel-body">
                            <form id="frmEdit" class="form-horizontal">
                                <div class="form-group">
                                    <label for="text" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Name">
                                            <div class="input-group-btn">
                                                <button type="button" id="myEditor_icon" class="btn btn-default" data-iconset="fontawesome"></button>
                                            </div>
                                            <input type="hidden" name="icon" class="item-menu">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="href" class="col-sm-2 control-label">URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="target" class="col-sm-2 control-label">Target</label>
                                    <div class="col-sm-10">
                                        <select name="target" id="target" class="form-control item-menu">
                                            <option value="_self">Self</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_top">Top</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title" class="col-sm-2 control-label">Tooltip</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Tooltip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="permission_type" class="col-sm-2 control-label">Permission</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="permission_type" class="form-control item-menu" id="title" placeholder="Permission Type">
                                    </div>
                                </div>
                               <b> For Menu Active Selection</b><hr style="margin-top: 2px; margin-bottom: 8px;">
                                <div class="form-group">
                                    <label for="segmentNo" class="col-sm-2 control-label">Segment No</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="segmentNo" class="form-control item-menu" id="segmentNo" placeholder="Segment No">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="segmentName" class="col-sm-2 control-label">Segment Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="segmentName" class="form-control item-menu" id="segmentName" placeholder="Segment Name">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="panel-footer">
                            <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fa fa-refresh"></i> Update</button>
                            <button type="button" id="btnAdd" class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>                    
                </div>
</div> 

</section></div>