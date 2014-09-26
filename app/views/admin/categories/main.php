<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 09.07.14
 * Time: 21:00
 */

?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-primary pull-right"><span class="glyphicons list"></span></span>Kategorien</h4></div>
            <div class="panel-body">
                <?php
                if(isset($data['msgDel']))
                {
                    echo '<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['msgDel'].'</div>';
                }
                elseif(isset($data['msgDelError']))
                {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['msgDelError'].'</div>';
                }
                ?>
                <div id="msgUpdate" style="display: none" class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button></div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Bezeichnung</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="categoryTable">
                    <?php
                    if($data['categories']){
                        foreach($data['categories'] as $row){
                            echo '<tr>
                                    <td><i class="'.$row->icon.'"></i></td>
                                    <td id="bez'.$row->kategorieID.'">'.$row->bezeichnung.'</td>
                                    <td style="text-align:center">
                                        <button id="edit" name="edit" value="'.$row->kategorieID.'" class="editCategoryButton btn btn-warning btn-xs">
                                            <span class="glyphicons pencil"></span>
                                        </button>
                                         <button id="save'.$row->kategorieID.'" name="save" value="'.$row->kategorieID.'" style="display:none" class="saveCategoryButton btn btn-primary btn-xs">
                                            <span class="glyphicons floppy_disk"></span>
                                        </button>
                                    </td>
                                    <td style="text-align:center">
                                        <form role="form" method="post" action="" class="form-horizontal">
                                            <input type="hidden" value="'.$row->kategorieID.'" name="id" />
                                            <button type="submit" name="delete" value="delete" class="btn btn-danger btn-xs">
                                                <span class="glyphicons bin"></span>
                                            </button>
                                        </form>
                                    </td>
                          </tr>';
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><span class="label label-success pull-right"><span class="glyphicons plus"></span></span>Kategorie hinzufügen</h4></div>
            <div class="panel-body">
                <?php
                if(isset($data['msg']))
                {
                    echo '<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['msg'].'</div>';
                }
                elseif(isset($data['error']))
                {
                    echo '<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>'.$data['error'].'</div>';
                }
                ?>
                <form role="form" method="post" action="" class="form-horizontal">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Bezeichnung</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputCategory" name="categoryName" placeholder="Kategorienbezeichnung">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Icon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputCategory" name="categoryIcon" placeholder="CSS Icon Klasse">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <button type="submit" name="submitNew" value="submit" class="btn btn-sm btn-success">Hinzufügen</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>