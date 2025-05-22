<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DAY@SHOP PRODUCTION-WORKSHOP</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f4f4f4;
    }

    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #0bc650;
      color: white;
      padding: 10px 20px;
    }

    .menu-icon {
      font-size: 24px;
      cursor: pointer;
    }

    .logo {
      background: white;
      color: #0bc650;
      border-radius: 20px;
      padding: 4px 10px;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 5px;
    }

    .logo::after {
      content: ">";
      font-size: 18px;
    }

    .title {
      font-weight: bold;
      font-size: 18px;
    }

    .week-input {
      background: white;
      padding: 5px 10px;
      border-radius: 10px;
      border: none;
    }

    .counters {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin: 10px 0;
    }

    .counter {
      flex: 1;
      margin: 10px;
      padding: 15px;
      border-radius: 10px;
      color: black;
      text-align: center;
      font-size: 20px;
      box-shadow: 2px 2px 6px rgba(0,0,0,0.1);
      min-width: 120px;
    }

    .counter span {
      display: block;
      font-size: 32px;
      font-weight: bold;
    }

    .em-espera { background: #5ee9ff; }
    .em-andamento { background: #7cff80; }
    .revisao { background: #fff87c; }
    .concluido { background: #ffaf5e; }
    .em-alerta { background: #ff5e5e; }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 0 auto;
      font-size: 14px;
      table-layout: fixed;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 6px;
      text-align: center;
      background: white;
    }

    th {
      background-color: #000;
      color: white;
      font-weight: normal;
    }

    td {
      height: 30px;
    }
  </style>
</head>
<body>

  <header>
    <div class="menu-icon">☰</div>
    <div class="logo">Valmet</div>
    <div class="title">DAY@SHOP PRODUCTION-WORKSHOP</div>
    <input class="week-input" type="text" placeholder="SEMANA:" />
  </header>

  <?php include 'components/dashboard/toolBar.php'; ?>

  <section class="counters">
    <div class="counter em-espera">Em espera <span id="espera">5</span></div>
    <div class="counter em-andamento">Em andamento <span id="andamento">8</span></div>
    <div class="counter revisao">Revisão <span id="revisao">16</span></div>
    <div class="counter concluido">Concluído <span id="concluido">36</span></div>
    <div class="counter em-alerta">Em alerta <span id="alerta">10</span></div>
  </section>

  <table>
    <thead>
      <tr>
        <th>PRI</th>
        <th>BU</th>
        <th>PCS</th>
        <th>Cliente</th>
        <th>Item</th>
        <th>DataEntrega</th>
        <th>DataReprog</th>
        <th>Custos</th>
        <th>Eng Ind</th>
        <th>Suprimentos</th>
        <th>CQ Recebimento</th>
        <th>Corte/Serra</th>
        <th>PRI</th>
        <th>PRI</th>
        <th>PRI</th>
        <th>Observações</th>
      </tr>
    </thead>
    <tbody>
      <!-- Linhas vazias -->
      <!-- ${'<tr>' + '<td></td>'.repeat(16) + '</tr>'.repeat(8)} -->
    </tbody>
  </table>

  <script src="../scripts/toolBarExpanded.js"></script>
</body>
</html>