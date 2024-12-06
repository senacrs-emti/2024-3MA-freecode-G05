<?php
include_once '../database/conexao.php';
include_once '../configuracao.php'; 
include_once '../header/header.php'; 

//TEM Q FAZER INNER JOIN
// comando sql para capturar os dados
$sql = "SELECT
        p.idpartidas,
        p.data,
        p.estadio,
        p.idtimeCasa,
        p.idtimeVis,
        tc.nome As NomeTimeCasa,
        tc.escudo AS EscudoTimeCasa,
        tc.sigla AS SiglaTimeCasa,
        tv.nome As NomeTimeVis,
        tv.escudo AS EscudoTimeVis,
        tv.sigla AS SiglaTimeVis
        FROM partidas AS p
        INNER JOIN times AS tc
        ON p.idtimeCasa = tc.idtime
        INNER JOIN times AS tv
        ON p.idtimeVis = tv.idtime;";
// executa o comando
$result = mysqli_query( $conn, $sql );
// transforma o resultado em dados
$data = mysqli_fetch_assoc($result);
// Conteúdo da página principal
?>

<div id="body-index">

	<section>
		<!-- Tabela da Esquerda com barra de rolagem na esquerda -->
		<div class="partidas_left">
			<!-- Conteúdo da tabela da esquerda (jogos) -->
			<div class="titulo-classificacao">PRÓXIMAS PARTIDAS</div>
			<?php
			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				//echo "Escudo: " . $row["EscudoTimeCasa"]. " - Sigla: " . $row["SiglaTimeCasa"]. "X" ."Sigla" . $row["SiglaTimeVis"]. "Escudo". $row["EscudoTimeVis"]."<br>";
				?>
				<a class="barra" href="../partida/partida.php?p=<?php echo $row['idpartidas']?>">
					<img class="times" src="<?php echo $varPathLocal;?>/img/times/<?php echo $row["EscudoTimeCasa"];?>" alt=""><p><?php echo $row["SiglaTimeCasa"];?></p>
					<p>X</p>
					<p><?php echo $row["SiglaTimeVis"];?></p><img class="times" src="<?php echo $varPathLocal;?>/img/times/<?php echo $row["EscudoTimeVis"];?>" alt="">
				</a>
				<?php
				}
			}
			?>
		
			<!-- Outros jogos podem ser adicionados aqui -->
		</div>
	
		<!-- Tabela da Direita com barra de rolagem na direita -->
		<div class="partidas_right">
			<div class="titulo-classificacao">TABELA DE CLASSIFICAÇÃO</div>
			<div class="tabela">
				<div class="topo">
					<p class="info-topo">Pos</p>
					<p class="info-topo">Clube</p>
					<p class="info-topo">Pts</p>
					<p class="info-topo">V</p>
					<p class="info-topo">E</p>
					<p class="info-topo">D</p>
					<p class="info-topo">Sg</p>
				</div>
				<div class="time-item">
					<p>1</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/BOT.png" alt="">Botafogo</div>
					<p>70</p><p>22</p><p>4</p><p>4</p><p>30</p>
				</div>
				<div class="time-item">
					<p>2</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/PAL.png" alt=""><p>Palmeiras</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>3</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/FOR.png" alt=""><p>Fortaleza</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>4</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/inter.png" alt=""><p>Internacional</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>5</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/FLA.png" alt=""><p>Flamengo</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>6</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/SAO 2.png" alt=""><p>São Paulo</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>7</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/ECB.png" alt=""><p>Bahia</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>8</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/CRU.png" alt=""><p>Cruzeiro</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>9</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/VAS.png" alt=""><p>Vasco</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>10</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/CAM.png" alt=""><p>Atlético-MG</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>11</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/gremio.png" alt=""><p>Grêmio</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>12</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/VIT.png" alt=""><p>Vitória</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>13</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/COR.png" alt=""><p>Corinthians</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>13</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/FLU.png" alt=""><p>Fluminense</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>15</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/CRI.png" alt=""><p>Criciúma</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>16</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/RBG.png" alt=""><p>Bragantino</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>17</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/CAP.png" alt=""><p>Athletico-Pr</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>18</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/JUV.png" alt=""><p>Juventude</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>19</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/CUI.png" alt=""><p>Cuiabá</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<div class="time-item">
					<p>20</p>
					<div class="time-logo"><img class="times" src="<?php echo $varPathLocal;?>/img/ACG.png" alt=""><p>Atlético-GO</p></div>
					<p>65</p><p>20</p><p>5</p><p>5</p><p>25</p>
				</div>
				<!-- Outros times da tabela podem ser adicionados aqui -->
			</div>
		</div>
	</section>
</div>

<?php
include '../footer/footer.php'; 
?>
