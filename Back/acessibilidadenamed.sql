-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 01:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acessibilidadenamed`
--

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
(3, 'Hospital Moinhos de Vento', ' Rua Ramiro Barcelos, 910 – Moinhos de Vento', 'Consultas e exames podem ser agendados pelo telefone ou através do site oficial .', 'Consultas e Exames: De segunda a sexta, das 7h às 19h\r\n\r\nEmergência: 24 horas', 'Com 92.882 m² de área construída, o hospital possui 465 leitos, quatro edifícios interligados, 2.887 médicos credenciados e 3.664 colaboradores .\r\n', 'Consultas e Exames: De segunda a sexta, das 7h às 19h\r\n\r\nEmergência: 24 horas', '-51.2085', '-30.0256', '', 'hospitalmoinhos.org.br', 'Fundado em 1927, o Hospital Moinhos de Vento é reconhecido como um dos cinco hospitais de excelência do Brasil pelo Ministério da Saúde. Destaca-se por sua infraestrutura moderna, atendimento humanizado e por estar entre os 150 melhores hospitais do mundo, segundo ranking da Newsweek .\r\n');

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
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `hospitais`
--
ALTER TABLE `hospitais`
  MODIFY `HospitalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
