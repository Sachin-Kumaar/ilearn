<?php
if (!isset($_SESSION)) {
    session_start();
}
include('navinclude.php');
include('../dbConnection.php');

if (isset($_SESSION['is_admin_login'])) {
    $adminEmail = $_SESSION['adminLogEmail'];
} else {
    echo "<script> location.href='../index.php';</script>";
}
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("../PaytmKit/lib/config_paytm.php");
require_once("../PaytmKit/lib/encdec_paytm.php");

$ORDER_ID = "";
$requestParamList = array();
$responseParamList = array();

if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

    // In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
    $ORDER_ID = $_POST["ORDER_ID"];

    // Create an array having all required parameters for status query.
    $requestParamList = array("MID" => PAYTM_MERCHANT_MID, "ORDERID" => $ORDER_ID);

    $StatusCheckSum = getChecksumFromArray($requestParamList, PAYTM_MERCHANT_KEY);

    $requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

    // Call the PG's getTxnStatusNew() function for verifying the transaction status.
    $responseParamList = getTxnStatusNew($requestParamList);
}

?>
<div class="container justify-content-center" style="margin: auto;">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="" class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label>Order ID: </label>
            <input class="form-control ml-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
        </div>
        <input class="btn btn-primary mx-4" value="View" type="submit">
    </form>
<?php
if (isset($responseParamList) && count($responseParamList) > 0) {
?>

        <div class="row justify-content-center">
            <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                    <tbody>
                        <?php
                        foreach ($responseParamList as $paramName => $paramValue) {
                        ?>
                            <tr>
                                <td ><label><?php echo $paramName ?></label></td>
                                <td ><?php echo $paramValue ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                        <td><button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
}
?>
</form>







<script src="../js/jquory.min.js"></script>
<script src="../js/poppper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/all.min.js"></script>
<script src="../js/adminloginrequest.js"></script>
<script src="../js/custom.js"></script>

</body>

</html>