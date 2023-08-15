<!DOCTYPE html>
<html>

<head>
  <title>Maintenace System - Generated Request Form</title>
</head>

<style>
  @page {
    size: A4 landscape;
    margin: 20mm;
  }

  body {
    font-family: Arial, sans-serif;
  }

  .title {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .rtv {
    position: relative;
    background-color: #fff;
    width: 72%;
    height: 280px;
    border: 1px solid #4b4a4a;
    padding: 1px;
    margin: 20px;
    border-bottom: none;
  }

  .rtv1 {
    position: relative;
    background-color: #fff;
    width: 70%;
    height: 280px;
    border: 1px solid #4b4a4a;
    padding: 2px;
    margin: 20px;
  }

  .abs {
    position: absolute;
  }

  .full-underline {
    width: 100%;
  }

  .full-underline span {
    display: block;
    width: 100%;
    height: 20px;
    border-bottom: 0.8px solid black;
  }

  .body-msg {
    text-align: justify;
  }

  .table-sign {
    position: relative;
    top: -20px;
    border-collapse: collapse;
  }

  .table-sign td {
    border-top: none;
  }

  .table-container {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .input-container {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }

  .input-controlnum {
    border: none;
    outline: none;
    background-color: transparent;
    border-bottom: 1px solid black;
    padding: 0;
    width: 30%;
  }

  .input-dt {
    border: none;
    outline: none;
    background-color: transparent;
    border-bottom: 1px solid black;
    padding: 0;
    width: 30%;
  }

  .dt-input {
    padding: 0;
    width: 45%;
  }

  .input-received {
    border: none;
    outline: none;
    background-color: transparent;
    border-bottom: 1px solid black;
    padding: 0;
    width: 62%;
  }

  .borderless-input {
    border: none;
    outline: none;
    background-color: transparent;
    border-bottom: 1px solid black;
    padding: 0;
    margin-top: 20px;
    width: 45%;
  }

  .borderless-input1 {
    border: none;
    outline: none;
    background-color: transparent;
    border-bottom: 1px solid black;
    width: 80%;
  }

  .borderless-input2 {
    border: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    border-bottom: 1px solid black;
    margin-top: 5px;
    width: 65%;
  }

  .borderless-input-sign {
    border: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    border-bottom: 1px solid black;
    margin-top: 40px;
    width: 80%;
  }

  .borderless-input-sign2 {
    border: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    border-bottom: 1px solid black;
    margin-top: 40px;
    /* Ito ay para ilagay ang input element sa ibabaw ng border line */
    width: 80%;
  }

  .borderless-input-sign3 {
    border: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    border-bottom: 1px solid black;
    margin-top: 40px;
    /* Ito ay para ilagay ang input element sa ibabaw ng border line */
    width: 80%;
  }

  .borderless-input3 {
    border: none;
    outline: none;
    background-color: transparent;
    padding: 0;
    border-bottom: 1px solid black;
    margin-top: 5px;
    /* Ito ay para ilagay ang input element sa ibabaw ng border line */
    width: 65%;
  }

  .tbl-form {
    /* border: 1px solid black; */
    width: 72.4%;
    margin: 0;
    border-collapse: collapse;
  }

  .td-form {
    padding: 1px;
    /* border: 1px solid black; */
    font-size: 14px;
    /* Adjust font size as needed */
    height: 5px;
    /* Adjust cell height as needed */
  }

  .bottom {
    padding-bottom: 10%;
  }
</style>

<body>
  <center>
    <table width="100%">
      <tr>
        <th><img src="logo2.jpg" alt="" height="80" /></th>
        <td>
          <span>
            <h4 style="padding-left: 5%">
              MAINTENANCE WORK ORDER REQUEST SLIP
            </h4>
          </span>
        </td>
      </tr>
    </table>
  </center>
  <div style="margin-top: 10px"></div>
  <center>
    <table>
      <th></th>
      <td style="padding-left: 800px">
        <b>Control No.:&nbsp;</b><input type="text" class="input-controlnum" />
      </td>
    </table>
    <table class="tbl-form">
      <tr>
        <td class="td-form"><b>Request&nbsp;for:</b></td>
        <td class="td-form">
          <input type="checkbox" id="machineEquipment" name="requestType" class="custom-checkbox" style="margin-right: 5px; border: 2px solid black" />
          <label for="machineEquipment"><span style="font-size: 17px">Machine/Equipment</span></label>

          <input type="checkbox" id="vehicle" name="requestType" class="custom-checkbox" style="margin-right: 5px; border: 2px solid black" />
          <label for="vehicle"><span style="font-size: 17px">Vehicle</span></label>

          <input type="checkbox" id="facility" name="requestType" class="custom-checkbox" style="margin-right: 5px; border: 2px solid black" />
          <label for="facility"><span style="font-size: 17px">Facility</span></label>

          <input type="checkbox" id="others" name="requestType" class="custom-checkbox" style="margin-right: 5px; border: 2px solid black" />
          <label for="others"><span style="font-size: 17px">Others</span></label>
        </td>
      </tr>
      <tr>
        <td class="td-form"><b>Description:</b></td>
        <td class="td-form">
          <input type="text" class="borderless-input1" />
        </td>
      </tr>
      <tr>
        <td class="td-form"><b>Location:</b></td>
        <td class="td-form">
          <input type="text" class="borderless-input1" />
        </td>
      </tr>
      <tr>
        <td class="td-form"><b>Date&nbsp;Requested:</b></td>
        <td class="td-form">
          <input type="text" class="borderless-input1" />
        </td>
      </tr>
      <tr>
        <td class="td-form"><b>Date&nbsp;Time&nbsp;Needed:</b></td>
        <td class="td-form">
          <input type="text" class="borderless-input1" />
        </td>
      </tr>
      <tr>
        <td class="td-form"><b>Requested&nbsp;Department:</b></td>
        <td class="td-form">
          <input type="text" class="borderless-input1" />
        </td>
      </tr>
    </table>
    <div class="content tl m20 rtv">
      <center>
        <h4>Request Description</h4>
      </center>
      <div class="full-underline abs">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

      <p class="body-msg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nam
        facilis corrupti voluptates voluptatum voluptas voluptatibus dolore,
      </p>
    </div>
    <table width="72.4%;" class="table-sign">
      <tr>
        <td style="border: 1px solid #0e0d0d; vertical-align: top">
          <label for="">
            <h4 style="margin: 0; padding: 0">Requested by:</h4>
          </label>
          <div class="input-container" style="margin-left: 40px">
            <input type="text" class="borderless-input-sign" /><br />
          </div>
          <p style="margin-top: 5px; font-size: 12px; text-align: center">
            Signature Over Printed Name
          </p>
        </td>

        <td style="border: 1px solid #0e0d0d">
          <label for="">
            <h4 style="margin: 0; padding: 0">Checked by:</h4>
          </label>
          <div class="input-container" style="margin-left: 40px">
            <input type="text" class="borderless-input-sign" /><br />
          </div>
          <p style="margin-top: 5px; font-size: 12px; text-align: center">
            Signature Over Printed Name
          </p>
        </td>
        <td style="border: 1px solid #0e0d0d">
          <label for="">
            <h4 style="margin: 0; padding: 0">Approved by:</h4>
          </label>
          <div class="input-container" style="margin-left: 40px">
            <input type="text" class="borderless-input-sign" /><br />
          </div>
          <p style="margin-top: 5px; font-size: 12px; text-align: center">
            Signature Over Printed Name
          </p>
        </td>
      </tr>
    </table>
  </center>
  <div style="margin-top: 60px"></div>
  <table>
    <tr>
      <td>
        <h4 style="padding-left: 160px">
          To&nbsp;be&nbsp;Completed&nbsp;By&nbsp;Maintenance&nbsp;Department
        </h4>
      </td>
    </tr>
    <tr>
      <td style="padding-left: 230px; padding-top: 10px">
        <b>Received By:</b>

        <input type="text" class="input-received" />
        <p style="
              margin-top: 5px;
              font-size: 14px;
              text-align: center;
              padding-left: 105px;
            ">
          Signature&nbsp;Over&nbsp;Printed&nbsp;Name
        </p>
      </td>
      <td style="padding-left: 120px">
        <b>MWO Control No.:&nbsp;</b><input type="text" class="input-controlnum" />
      </td>
    </tr>
    <tr>
      <td></td>
      <td style="padding-left: 170px">
        <b>Date:&nbsp;</b><input type="text" class="input-dt" /><b>Time</b><input type="text" class="input-dt" />
      </td>
    </tr>
  </table>
  <div style="margin-top: 20px"></div>
  <table>
    <tr>
      <td style="padding-left: 170px">
        <b>Date&nbsp;Started:&nbsp;</b><input type="text" class="dt-input" />
      </td>
      <td style="padding-left: 20px">
        <b>Date&nbsp;Completed:&nbsp;</b><input type="text" class="dt-input" />
      </td>
      <td style="padding-left: 20px">
        <b>Number&nbsp;of&nbsp;Hr/Day:&nbsp;</b><input type="text" class="dt-input" />
      </td>
    </tr>
    <tr>
      <td style="padding-left: 170px">
        <b>Time&nbsp;Started:&nbsp;</b><input type="text" class="dt-input" />
      </td>
      <td style="padding-left: 20px">
        <b>Time&nbsp;Completed:&nbsp;</b><input type="text" class="dt-input" />
      </td>
    </tr>
  </table>
  <center>
    <div class="content tl m20 rtv1">
      <center>
        <h4>Description of Completed Works</h4>
      </center>
      <div class="full-underline abs">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>

      <p class="body-msg">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nam
        facilis corrupti voluptates voluptatum voluptas voluptatibus dolore,
        illo magnam id! Rem odit maiores ut possimus vel labore iusto
      </p>
      <!-- <h1>PEKERJAAN EMERGENCY PEMBERSIHAN BENDA ASING DI TOWER 07 SECTION NGENA-TUBAN</h1> -->
    </div>
  </center>
  <div class="table-container">
    <table width="70%">
      <tr>
        <td>
          <div class="input-container">
            <label for="input-text">
              <b>Completed by:</b>
            </label>
            <input type="text" class="borderless-input" />
          </div>
          <div class="input-container" style="padding-left: 110px">
            <input type="text" class="borderless-input2" />
          </div>
          <div class="input-container" style="padding-left: 110px">
            <input type="text" class="borderless-input2" />
          </div>
          <div style="padding-bottom: 5%"></div>
        </td>

        <td>
          <div class="input-container">
            <label for="input-text">
              <b>Confirmed by:</b>
            </label>
            <input type="text" class="borderless-input" />
          </div>
          <div class="input-container" style="padding-left: 110px">
            <input type="text" class="borderless-input2" />
          </div>
          <div class="input-container" style="padding-left: 110px">
            <input type="text" class="borderless-input3" />
          </div>
          <div style="padding-bottom: 5%"></div>
        </td>
      </tr>
    </table>
  </div>
</body>

</html>