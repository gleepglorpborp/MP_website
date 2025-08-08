-- Select the database
USE `mp`;

-- Drop old table if it exists
DROP TABLE IF EXISTS `image`;

-- Create new image table
CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `CREATED_TIME` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `deepfake` decimal(11,2) NOT NULL,
  `genai` decimal(11,2) NOT NULL,
  `conclusion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Set primary key
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

-- Set AUTO_INCREMENT
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
