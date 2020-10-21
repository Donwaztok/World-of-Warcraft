CREATE DATABASE wow;
USE wow;

CREATE TABLE users (
	id int AUTO_INCREMENT NOT NULL,
	nickname varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	portrait_type varchar(255),
    Created DATETIME DEFAULT CURRENT_TIMESTAMP,
    Updated DATETIME ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
);

CREATE TABLE boss (
	id int AUTO_INCREMENT NOT NULL,
	nome varchar(50) NOT NULL,
	arquivo varchar(50) NOT NULL,
	dps TEXT,
	tank TEXT,
	heal TEXT,
	loot TEXT,
	video varchar(50),
	PRIMARY KEY (id)
);

CREATE TABLE comments (
	id int AUTO_INCREMENT NOT NULL,
	boss_id int NOT NULL,
	user_id int NOT NULL,
	content TEXT,
	PRIMARY KEY (id),
	FOREIGN KEY (boss_id) REFERENCES boss(id),
	FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO boss VALUES (0,'Skorpyron','Skorpyron',
'<p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<p><a href="http://pt.wowhead.com/spell=204531">Correntes Arcanas</a> se acumulam durante <a href="http://pt.wowhead.com/spell=204275">Corrente Arcana</a> e precisam ser quebradas para reduzir o dano recebido.</p><p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<p>
					<h2>Armamentos:</h2>
					<ul>
						<li><b>Tecido: </b>
							<a href="http://pt.wowhead.com/item=140849?bonus=3445">Cilha Altaneira Antiquada</a>, 
							<a href="http://pt.wowhead.com/item=140888?bonus=3445">Luvas do Tratador de Escorpídeos</a>
						</li>
						<li><b>Couro: </b>
							<a href="http://pt.wowhead.com/item=140862?bonus=3445">Culotes Roídos por Noctívoros</a>, 
							<a href="http://pt.wowhead.com/item=140901?bonus=3445">Chapéu Vintage da Nobreza de Suramar</a>
						</li>
						<li><b>Malha: </b>
							<a href="http://pt.wowhead.com/item=140875?bonus=3445">Cota de Arcanoquitina</a>, 
							<a href="http://pt.wowhead.com/item=140876?bonus=3445">Braçadeiras Resistentes a Ferrões</a>
						</li>
						<li><b>Placas: </b>
							<a href="https://pt.wowhead.com/item=140902?bonus=3445">Punheleiras de Carapaça Pontiaguda</a>, 
							<a href="https://pt.wowhead.com/item=140884?bonus=3445">Pisantes com Biqueira de Pedra de Meridiano</a>
						</li>
						<li><b>Pescoço: </b>
							<a href="https://pt.wowhead.com/item=140898?bonus=3445">Fieira Radiante de Olhos de Escorpídeo</a>
						</li>
						<li><b>Berloque: </b>
							<a href="https://pt.wowhead.com/item=140789?bonus=3445">Exoesqueleto Animado</a>, 
							<a href="https://pt.wowhead.com/item=140790?bonus=3445">Garra do Escorpídeo Cristalino</a>
						</li>
					</ul>
					
					<h2>Reliquias:</h2>

					<ul>
						<li><b>Arcano: </b>
							<a href="https://pt.wowhead.com/item=140827?bonus=3445">Glândula de Manatoxina</a>
						</li>
						<li><b>Ferro: </b>
							<a href="https://pt.wowhead.com/item=140815?bonus=3445">Fragmento de Quitina Infundido</a>
						</li>
						<li><b>Tempestade: </b>
							<a href="https://pt.wowhead.com/item=140840?bonus=3445">Mandíbula Chilreante</a>
						</li>
					</ul>
				</p>',
'EDLCBxJGg3E');

INSERT INTO boss VALUES (0,'Anomalia Cronomática','Anomalia',
'<p>Particulas de Tempo Enfraquecidas e Particulas de Tempo Fragmentadas causam dano continuo ao raide por meio de <a href="http://pt.wowhead.com/spell=207228">Distorcer Nascente da Noite</a> a menos que sejam interrompidas.</p><p>Derrote as Particulas de Tempo Enfraquecidas rapidamente para permitir que os tanques interrompam <a href="http://pt.wowhead.com/spell=211927">Poder Esmagador</a>.</p><p>Ao ser atingido com <a href="http://pt.wowhead.com/spell=212109">Golpe Temporal</a> a Anomalia Cronomática recebe dano adicional.</p>',
'<p>Monitore suas aplicações de <a href="https://pt.wowhead.com/spell=206607">Particulas Cronométricas</a> e atente para mudanças na duração delas.</p><p>O <a href="http://pt.wowhead.com/spell=212109">Golpe Temporal</a> do Orbe Temporal pode interromper 	<a href="http://pt.wowhead.com/spell=211927">Poder Esmagador</a></p>',
'<p>Você terá intervalos de tempo significativamente diferentes para reagir à <a href="http://pt.wowhead.com/spell=206609">Liberação do Tempo</a>, dependendo da velocidade atual de passagem do tempo.</p><p>Particulas de Tempo Enfraquecidas causam dano continuamente a todo o raide por meio de <a href="http://pt.wowhead.com/spell=207228">Distorcer Nascente da Noite</a>.</p><p><a href="http://pt.wowhead.com/spell=211927">Poder Esmagador</a> causa dano crescente até ser interrompido por um <a href="http://pt.wowhead.com/spell=212109">Golpe Temporal</a>.</p>',
'<h2>Armamentos:</h2>

				<ul>
					<li><b>Tecido: </b>
						<a href="http://pt.wowhead.com/item=140853?bonus=3445">Dragonas Rasgadas pelo Caos</a>, 
						<a href="http://pt.wowhead.com/item=140848?bonus=3445">Vestes da Energia Flutuante</a>
					</li>
					<li><b>Couro: </b>
						<a href="http://pt.wowhead.com/item=140860?bonus=3445">Botinas do Passo Vacilante</a>, 
						<a href="http://pt.wowhead.com/item=140863?bonus=3445">Luvas Temporalmente Deslocadas</a>
					</li>
					<li><b>Malha: </b>
						<a href="http://pt.wowhead.com/item=140903?bonus=3445">Capuz da Oportunidade Fugaz</a>, 
						<a href="http://pt.wowhead.com/item=140872?bonus=3445">Brafoneiras da Memória Distorcida</a>
					</li>
					<li><b>Placas: </b>
						<a href="http://pt.wowhead.com/item=140882?bonus=3445">Coxotes Crono-temperados</a>, 
						<a href="http://pt.wowhead.com/item=140879?bonus=3445">Manoplas das Eras Fraturadas</a>
					</li>
					<li><b>Pescoço: </b>
						<a href="http://pt.wowhead.com/item=140894?bonus=3445">Pingente da Pedra Temporal Zelosa</a>
					</li>
					<li><b>Berloque: </b>
						<a href="http://pt.wowhead.com/item=140792?bonus=3445">Metrônomo Caótico</a>, 
						<a href="http://pt.wowhead.com/item=140791?bonus=3445">Empunhadura de Adaga Real</a>
					</li>
				</ul>

				<h2>Reliquias:</h2>

				<ul>
					<li><b>Gelo: </b>
						<a href="http://pt.wowhead.com/item=140831?bonus=3445">Gotícula Suspensa da Nascente da Noite</a>
					</li>
					<li><b>Sagrado: </b>
						<a href="http://pt.wowhead.com/item=140843?bonus=3445">Fagulha Temporal Tremeluzente</a>
					</li>
					<li><b>Sombra: </b>
						<a href="http://pt.wowhead.com/item=140821?bonus=3445">Precipício da Eternidade</a>
					</li>
				</ul>',
'CYGn6QBFu7U');

INSERT INTO boss VALUES (0,'Trilliax','Trilliax',
'<p>Durante o modo Maniaco, fique perto do seu parceiro ao ser conectado por <a href="http://pt.wowhead.com/spell=208924">Laços Elétricos</a>.</p><p>Durante o modo Zelador, salte nos Esfregadores quando canalizarem <a href="http://pt.wowhead.com/spell=207327">Destruição Limpadora</a>.</p><p>Durante o modo Faxineiro, fique longe do raide quando afetado por <a href="http://pt.wowhead.com/spell=208506">Esterilizar</a>.</p>',
'<p>Alternem-se no recebimento de <a href="http://pt.wowhead.com/spell=206641">Talho Arcano</a>.</p><p>Durante o modo Maniaco, fique perto do seu companheiro ao ser vinculado por <a href="http://pt.wowhead.com/spell=208924">Laços Elétricos</a>.</p><p>Durante o modo Zelador, salte nos Esfregadores quando eles lançarem <a href="http://pt.wowhead.com/spell=207327">Destruição Limpadora</a>.</p><p>Mova Trilliax pela sala continuamente para evitar o dano de <a href="http://pt.wowhead.com/spell=206482">Vazamento Arcano</a>.</p>',
'<p>Durante o modo Maniaco, a <a href="http://pt.wowhead.com/spell=206645">Ruptura de Mana</a> pulsa, causando dano ao raide.</p><p>Durante o modo faxineiro, cure os jogadores afligidos por <a href="http://pt.wowhead.com/spell=206788">Fatia Tóxica</a>.</p>',
'<h2>Armamentos:</h2>

				<ul>
					<li><b>Tecido: </b>
						<a href="http://pt.wowhead.com/item=140851?bonus=3445">Capuz do Custódio do Baluarte da Noite</a>, 
						<a href="http://pt.wowhead.com/item=140854?bonus=3445">Sandálias Perpetuamente Enlameadas</a>
					</li>
					<li><b>Couro: </b>
						<a href="http://pt.wowhead.com/item=140858?bonus=3445">Cinturão do Carregador de Bolo</a>, 
						<a href="http://pt.wowhead.com/item=140865?bonus=3445">Túnica da Devoção Inabalável</a>
					</li>
					<li><b>Malha: </b>
						<a href="http://pt.wowhead.com/item=140871?bonus=3445">Coxotes Pertinazes</a>, 
						<a href="http://pt.wowhead.com/item=140869?bonus=3445">Manoplas Isoladas do Esterilizador</a>
					</li>
					<li><b>Placas: </b>
						<a href="http://pt.wowhead.com/item=140880?bonus=3445">Cinturão Dourado dos Filhos da Noite</a>, 
						<a href="http://pt.wowhead.com/item=140904?bonus=3445">Botas Imaculadamente Polidas</a>
					</li>
					<li><b>Berloque: </b>
						<a href="http://pt.wowhead.com/item=140794?bonus=3445">Dedo de Arcanogolem</a>, 
						<a href="http://pt.wowhead.com/item=140793?bonus=3445">Bolo Perfeitamente Preservado</a>
					</li>
				</ul>

				<h2>Reliquias:</h2>

				<ul>
					<li><b>Arcano: </b>
						<a href="http://pt.wowhead.com/item=140812?bonus=3445">Arbusto Esfrega-mana Encharcado</a>
					</li>
					<li><b>Sangue: </b>
						<a href="http://pt.wowhead.com/item=140818?bonus=3445">Contaminador Estranho</a>
					</li>
					<li><b>Vida: </b>
						<a href="http://pt.wowhead.com/item=140838?bonus=3445">Esfera de Personalidade de Constructo</a>
					</li>
				</ul>',
'FoqfUbWUWyI');

INSERT INTO boss VALUES (0,'Magilâmina Aluriel','Aluriel',
'<p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<p><a href="http://pt.wowhead.com/spell=204531">Correntes Arcanas</a> se acumulam durante <a href="http://pt.wowhead.com/spell=204275">Corrente Arcana</a> e precisam ser quebradas para reduzir o dano recebido.</p><p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<p>Esconda-se atrás de <a href="https://pt.wowhead.com/spell=204292">Fragmentos Cristalinos</a> para proteger-se da <a href="http://pt.wowhead.com/spell=204316">Onda de Choque</a></p>',
'<h2>Armamentos:</h2>
					<ul>
						<li><b>Tecido: </b>
							<a href="http://pt.wowhead.com/item=140849?bonus=3445">Cilha Altaneira Antiquada</a>, 
							<a href="http://pt.wowhead.com/item=140888?bonus=3445">Luvas do Tratador de Escorpídeos</a>
						</li>
						<li><b>Couro: </b>
							<a href="http://pt.wowhead.com/item=140862?bonus=3445">Culotes Roídos por Noctívoros</a>, 
							<a href="http://pt.wowhead.com/item=140901?bonus=3445">Chapéu Vintage da Nobreza de Suramar</a>
						</li>
						<li><b>Malha: </b>
							<a href="http://pt.wowhead.com/item=140875?bonus=3445">Cota de Arcanoquitina</a>, 
							<a href="http://pt.wowhead.com/item=140876?bonus=3445">Braçadeiras Resistentes a Ferrões</a>
						</li>
						<li><b>Placas: </b>
							<a href="https://pt.wowhead.com/item=140902?bonus=3445">Punheleiras de Carapaça Pontiaguda</a>, 
							<a href="https://pt.wowhead.com/item=140884?bonus=3445">Pisantes com Biqueira de Pedra de Meridiano</a>
						</li>
						<li><b>Pescoço: </b>
							<a href="https://pt.wowhead.com/item=140898?bonus=3445">Fieira Radiante de Olhos de Escorpídeo</a>
						</li>
						<li><b>Berloque: </b>
							<a href="https://pt.wowhead.com/item=140789?bonus=3445">Exoesqueleto Animado</a>, 
							<a href="https://pt.wowhead.com/item=140790?bonus=3445">Garra do Escorpídeo Cristalino</a>
						</li>
					</ul>
					
					<h2>Reliquias:</h2>

					<ul>
						<li><b>Arcano: </b>
							<a href="https://pt.wowhead.com/item=140827?bonus=3445">Glândula de Manatoxina</a>
						</li>
						<li><b>Ferro: </b>
							<a href="https://pt.wowhead.com/item=140815?bonus=3445">Fragmento de Quitina Infundido</a>
						</li>
						<li><b>Tempestade: </b>
							<a href="https://pt.wowhead.com/item=140840?bonus=3445">Mandíbula Chilreante</a>
						</li>
					</ul>',
'IoDwIlCMdwM');

INSERT INTO boss VALUES (0,'Áugure Estelar Etraeus','Augure',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'vb2Or-3x2b4');

INSERT INTO boss VALUES (0,'Alto-botânico Tel''arn','Tel''arn',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'PLZZHygyWsQ');

INSERT INTO boss VALUES (0,'Krosus','Krosus',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'');


INSERT INTO boss VALUES (0,'Taecondrius','Taecondrius',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'E4BB3iCjOiI');


INSERT INTO boss VALUES (0,'Grã-Magistra Elisande','Elisande',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'XDwgpnAaOWE');


INSERT INTO boss VALUES (0,'Gul''dan','Gul''dan',
'<p>O que um Dps faz?</p>',
'<p>To sem saber!</p>',
'<p>Agrando mob de outra Raid!</p>',
'',
'VfxiTdZx7Pc');


