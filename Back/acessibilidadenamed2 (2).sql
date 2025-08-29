-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2025 at 10:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acessibilidadenamed2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `comentarioID` int(11) NOT NULL,
  `IDUsuario` int(10) UNSIGNED NOT NULL,
  `IDHospital` int(11) NOT NULL,
  `Texto` longtext NOT NULL,
  `Data` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitais`
--

CREATE TABLE `hospitais` (
  `HospitalID` int(11) NOT NULL,
  `Nome` varchar(200) NOT NULL,
  `Endereco` longtext NOT NULL,
  `FormaAgendamento` longtext NOT NULL,
  `Horarios` longtext NOT NULL,
  `Infraestrutura` longtext NOT NULL,
  `Atendimento` longtext NOT NULL,
  `Long` varchar(30) NOT NULL,
  `Lat` varchar(30) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `LinkSite` varchar(255) NOT NULL,
  `ParagrafoAbertura` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitais`
--

INSERT INTO `hospitais` (`HospitalID`, `Nome`, `Endereco`, `FormaAgendamento`, `Horarios`, `Infraestrutura`, `Atendimento`, `Long`, `Lat`, `Foto`, `LinkSite`, `ParagrafoAbertura`) VALUES
(1, 'Mãe de Deus', 'Rua José de Alencar, 286 – Menino Deus', 'Agendamento: Pode ser feito pelo telefone, WhatsApp, site oficial ou pelo aplicativo Mãe 360º .', '\r\nConsultas e Exames: De segunda a sexta, das 7:30h às 19:30h\r\n\r\nEmergência: 24 horas', '\r\nCom uma área construída de aproximadamente 55 mil m², o Hospital Mãe de Deus dispõe de 312 leitos ativos e mais de 2.000 equipamentos de tecnologia avançada. A instituição conta com uma equipe altamente qualificada, composta por mais de 2.300 médicos credenciados, oferecendo serviços em diversas especialidades médicas .\r\n ', 'Ressonância: De segunda a sexta das 7h às 22h40. Finais de semana e feriados das 8h às 18h.\r\nTomografia: De segunda a sexta das 7h às 22h40. Finais de semana e feriados das 8h às 18h.\r\nRaio-X: De segunda a sexta das 11h às 19h.\r\nMedicina Nuclear e PET/CT: De segunda a sexta das 7h às 18h.\r\nHorário de atendimento ao público: De segunda a sexta das 9h às 12h e das 13h às 17h.', '-51.2191', '-30.0635', '', 'https://www.maededeus.com.br/', 'Desde 1979, o Hospital Mãe de Deus oferece soluções completas em saúde, diagnóstico e tratamento, com foco em atendimento humanizado e seguro. É acreditado pela Joint Commission International, destacando-se pela excelência e modernização contínua dos serviços .\r\n360.maededeus.com.br'),
(2, ' Hospital de Clínicas de Porto Alegre', 'Rua São Manoel, 543 – Rio Branco\r\n', 'Consultas e exames podem ser agendados pelo telefone ou presencialmente no ambulatório, localizado no Bloco C .', 'Ambulatório de Consultas: De segunda a sexta, das 8h às 18h\r\n\r\nEmergência: 24 horas', 'Com uma área construída de 229.160,37 m², o hospital conta com 860 leitos, 142 consultórios ambulatoriais, 35 salas cirúrgicas, além de centros de pesquisa e ensino vinculados à UFRGS .\r\n', 'Ambulatório de Consultas: De segunda a sexta, das 8h às 18h\r\n\r\nEmergência: 24 horas', '-51.2071', '-30.0441', '', ' hcpa.edu.br', ' O HCPA é um hospital público e universitário vinculado ao Ministério da Educação e à UFRGS. Referência em atendimento de alta complexidade, ensino e pesquisa, destaca-se por sua infraestrutura moderna e compromisso com a excelência no serviço público de saúde .\r\nhcpa.edu.br'),
(3, 'Hospital Moinhos de Vento', ' Rua Ramiro Barcelos, 910 – Moinhos de Vento', 'Consultas e exames podem ser agendados pelo telefone ou através do site oficial .', 'Consultas e Exames: De segunda a sexta, das 7h às 19h\r\n\r\nEmergência: 24 horas', 'Com 92.882 m² de área construída, o hospital possui 465 leitos, quatro edifícios interligados, 2.887 médicos credenciados e 3.664 colaboradores .\r\n', 'Consultas e Exames: De segunda a sexta, das 7h às 19h\r\n\r\nEmergência: 24 horas', '-51.2085', '-30.0256', '', 'hospitalmoinhos.org.br', 'Fundado em 1927, o Hospital Moinhos de Vento é reconhecido como um dos cinco hospitais de excelência do Brasil pelo Ministério da Saúde. Destaca-se por sua infraestrutura moderna, atendimento humanizado e por estar entre os 150 melhores hospitais do mundo, segundo ranking da Newsweek .\r\n'),
(7, 'Hospital Ernesto Dornelles', '\r\nAv. Ipiranga, 1801 – Azenha, Porto Alegre – RS, 90160-091\r\n', 'Consultas por telefone (51) 3217-1288 ou pelo site', 'Seg a sex, 7h às 19h; sáb, 8h às 12h', '312 leitos, 33 especialidades, UTI, centro cirúrgico, diagnóstico por imagem', 'Convênios, particular, pronto atendimento, oncologia, mastologia', '-30.0475', '-51.2175', '', 'https://www.hed.com.br/', 'O Hospital Ernesto Dornelles é referência em atendimento hospitalar no Sul do Brasil, com estrutura moderna e equipe altamente qualificada.'),
(8, 'Hospital Materno Infantil Presidente Vargas', 'Av. Independência, 661 – Independência, Porto Alegre – RS, 90035-076', 'Consultas de retorno via WhatsApp: (51) 3289-3257', 'Emergência 24h; ambulatório conforme agendamento', '180 leitos, UTI neonatal e pediátrica, centro obstétrico, banco de leite', '100% SUS, referência em saúde da mulher e da criança', '-30.0272', '-51.2089', '', 'https://prefeitura.poa.br/carta-de-servicos/hospital-materno-infantil-presidente-vargas', 'O HMIPV é um hospital público especializado em saúde materno-infantil, referência em atendimento humanizado e integral pelo SUS'),
(9, 'Hospital Divina Providência', 'Rua da Gruta, 145 – Cascata, Porto Alegre – RS, 91712-160', 'Pelo site ou telefone (51) 3320-6000', 'Atendimento 24h; agendamentos conforme especialidade', '300+ leitos, UTI adulto e neonatal, centro obstétrico, centro cirúrgico, maternidade', 'SUS, convênios, particular; urgência, internação, ambulatório', '-30.0991', '-51.2009', '', 'https://divinaprovidencia.org.br/divina/', 'Fundado em 1969, o Hospital Divina Providência é referência em cuidado humanizado e integral, com forte atuação em saúde materno-infantil e atendimento multiprofissional.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_nasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Usuario`, `Email`, `senha`, `data_nasc`) VALUES
(1, '[Bialinda]', '[Bibilinda@gmail.com', '[123456]', '2007-05-01'),
(2, '1111', 'porquenpode@gmail.com', '$2y$10$bBJtUy.96UzYmz7oQcF1UuA.JlAjMcHJOBuiBcIKBFAL6lMnVUkGW', '0000-00-00'),
(3, '1111', '11@11', '$2y$10$v9y/B5EDsrfIa73eAVea5OABmTuJ5F0B.wOk2C2tC/SRqgYvQsnke', '0000-00-00'),
(4, '1111', '11@11', '$2y$10$B37Ymb9QDCKlhE6AT9HdbeLnpLbI/Y85q8PulFTtIgaPynhx59sV6', '0000-00-00'),
(5, '1111', '11@11', '$2y$10$gYbGENys0XJAjm9COGqLNeaTjJFKnoRDdNGxK62GtwMX7Z6m6n/0a', '0000-00-00'),
(6, 'bia', 'oioioio@oi.com.br', '$2y$10$OQWhtj8emzTQ0flXRDKuJ.Wvjv19xLnPaR/gZ7QoD7n8Qo/IZwD76', '0000-00-00'),
(7, 'bia', 'oioioio@oi.com.br', '$2y$10$iyGAWsvySX3ayRCSIrZYEexYSIm1sZDKDRqcDuVdp7R0hSBJFEno.', '0000-00-00'),
(8, 'bianca', 'oioioio@oi.com.br', '$2y$10$1jub4PRX7xo4qzzUX5FitusZxEEpLvSk6yy2tBTGndXGt1u/31k5G', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`comentarioID`),
  ADD KEY `IDUsuario` (`IDUsuario`),
  ADD KEY `IDHospital` (`IDHospital`);

--
-- Indexes for table `hospitais`
--
ALTER TABLE `hospitais`
  ADD PRIMARY KEY (`HospitalID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `comentarioID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitais`
--
ALTER TABLE `hospitais`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`IDUsuario`) REFERENCES `usuarios` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`IDHospital`) REFERENCES `hospitais` (`HospitalID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
