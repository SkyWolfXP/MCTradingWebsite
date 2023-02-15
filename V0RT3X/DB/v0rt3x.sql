CREATE TABLE `buyers` (
  `SerialNo` int(11) NOT NULL,
  `UUID` varchar(32) NOT NULL,
  `DCID` varchar(24) NOT NULL,
  `MCTrades` int(11) NOT NULL,
  `IRLTrades` int(11) NOT NULL
);
ALTER TABLE `buyers`
ADD PRIMARY KEY (`SerialNo`);
