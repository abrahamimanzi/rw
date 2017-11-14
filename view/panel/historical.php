
        <div class="container-fluid">
            <div class="block-header">
                <!-- <h2>
                    JQUERY DATATABLES
                </h2> -->
            </div>
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORICAL
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Registrar</th>
                                            <th>amount</th>
                                            <th>receipt number</th>
                                            <th>card issue</th>
                                            <th>payment state</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Registrar</th>
                                            <th>amount</th>
                                            <th>receipt number</th>
                                            <th>card issue</th>
                                            <th>payment state</th>
                                            <th>date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if ($_SESSION["user_groups"] == 'Super-Admin' OR $_SESSION["user_groups"] == 'View-Admin') {
                                                $sql = "SELECT * FROM payment_receive ORDER BY `ID` DESC";

                                            } else {
                                                $user_ID = $_SESSION["user_ID"];
                                                $sql = "SELECT * FROM payment_receive WHERE `user_ID` = '$user_ID' ORDER BY `ID` DESC";
                                            }
                                            $result = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($result) > 0) {
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    ?>

                                                    <tr>
                                                        <td><?=$row["registrar"];?></td>
                                                        <td><?=$row["currency"];?> <?=$row["amount"];?></td>
                                                        <td><?=$row["receipt_number"];?></td>
                                                        <td><?=$row["card_issue"];?> <?=$row["card_number"];?></td>
                                                        <td><?=$row["payment_state"];?></td>
                                                        <td><?=$row["payment_date"];?></td>
                                                        <td>
                                                            <?php if ($row["receipt_number"]!="") { ?>
                                                            <a href="<?=DN?>receipt.php?id=<?=$row["token"];?>" target="_blank" class="btn btn-info waves-effect">RECEIPT</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo "0 results";
                                            }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>