use Rocambolesque;

drop procedure if exists SP_createUser;
delimiter //
CREATE PROCEDURE SP_createUser(
    IN p_firstName VARCHAR(50),
    IN p_infix VARCHAR(50),
    IN p_lastName VARCHAR(50),
    IN p_phoneNumber VARCHAR(20),
    IN p_email VARCHAR(255),
    IN p_password VARCHAR(255)
)
BEGIN
    DECLARE v_personId INT;

    INSERT INTO Person (firstName, infix, lastName, type, isActive, remark, createdAt, updatedAt) 
    VALUES (p_firstName, p_infix, p_lastName, 1, 1, '', NOW(), NOW());

    SET v_personId = LAST_INSERT_ID();

    INSERT INTO Contact (personId, email, phone, isActive, remark, createdAt, updatedAt) 
    VALUES (v_personId, p_email, p_phoneNumber, 1, '', NOW(), NOW());

    INSERT INTO User (personId, password, isActive, remark, createdAt, updatedAt) 
    VALUES (v_personId, p_password, 1, '', NOW(), NOW());

    INSERT INTO UserPerRole (roleId, userId, isActive, remark, createdAt, updatedAt) 
    VALUES (1, v_personId, 1, 'default role', NOW(), NOW());
END //
DELIMITER ;