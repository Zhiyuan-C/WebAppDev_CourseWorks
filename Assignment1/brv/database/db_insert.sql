INSERT INTO Author(full_name)
	VALUES 
	("Deborah Graham"),
	("Nettie Reilly"),
	("Sylvie Ramsey"),
	("Adnan Holt"),
	("Glenn Middleton"),
	("Mackenzie Kennedy");

INSERT INTO Category(name)
	VALUES
	("Fantasy"),
	("Fiction"),
	("Romance"),
	("Detective");
	
INSERT INTO User(nick_name)
	VALUES
	("Barber"),
	("Bambam"),
	("Sandy"),
	("Gibby"),
	("Cyclone"),
	("Poncho"),
	("Oracle"),
	("Dice");


INSERT INTO Book(title, cover, published, description, Category_id, Author_id)
	SELECT 'Sacred Snow', "defaultImg/Sacred_Snow.jpeg", '2005-02-04', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet erat eleifend, eleifend sem in, convallis enim. Nunc vitae.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Fantasy'
	AND Author.full_name = "Deborah Graham"
	UNION
	SELECT 'The Stolen Butterfly', "defaultImg/The_Stolen_Butterfly.jpeg", '2010-04-21', "Consectetur adipiscing elit. Pellentesque vel eros sed dui consequat rhoncus. Cras bibendum nibh turpis, vitae vulputate eros posuere sed. Nunc nec ullamcorper ligula, id porta.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Detective'
	AND Author.full_name = "Glenn Middleton"
	UNION
	SELECT 'Gate of Tower', "defaultImg/Gate_of_Tower.jpeg", '2015-01-12', "Sed diam dui, consequat eget luctus sed, sollicitudin at enim. Donec scelerisque ligula sed lectus.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Fiction'
	AND Author.full_name = "Adnan Holt"
	UNION
	SELECT "The Dreams's Servant", "defaultImg/fantasy.jpeg", '2012-10-05', "Donec est purus, ultrices vitae vestibulum nec, vehicula ac libero. Mauris pellentesque facilisis ex, quis sodales purus vehicula ut. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tincidunt ullamcorper vehicula. Integer mattis nibh eget.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Fiction'
	AND Author.full_name = "Mackenzie Kennedy"
	UNION
	SELECT 'The Silk of the Misty', "defaultImg/Misty.jpeg", '2006-07-04', "Phasellus egestas nulla non dictum ultricies. Nam vitae laoreet dui. Cras ac ultricies eros, quis tempus odio. Pellentesque accumsan tincidunt dolor vitae ultricies. Sed vitae volutpat mi. Aliquam aliquam nulla nec nibh vestibulum rutrum. Vivamus.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Romance'
	AND Author.full_name = "Sylvie Ramsey"
	UNION
	SELECT 'Snow in the Shores', "defaultImg/Snow_in_the_Shores.jpeg", '2011-11-14', "Aenean mollis, sem ut congue pulvinar, nulla lorem laoreet magna, id vulputate magna ligula ut lectus. Donec volutpat semper felis, eu commodo.", Category.id, Author.id
	FROM Category, Author
	WHERE Category.name = 'Detective'
	AND Author.full_name = "Nettie Reilly";

INSERT INTO Review(rating, message, Book_id, User_id)
	SELECT '4', "Etiam purus velit, molestie vel efficitur sit amet, dapibus ut lorem. Mauris lacinia neque nec velit laoreet, sit amet pharetra nisi mattis. Aliquam ut euismod ipsum. In facilisis dui vel finibus mollis. Morbi elit mi, sagittis quis sollicitudin in, vulputate.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'Sacred Snow'
	AND User.nick_name = 'Barber'
	UNION
	SELECT '3', "Nulla rutrum eu mi sed accumsan. Nullam neque lorem, tristique vitae odio a, malesuada interdum augue. Proin tempor scelerisque justo in ultrices. Vivamus leo nisi, gravida quis nibh porttitor, sodales pretium eros. Nulla facilisi. Suspendisse nisi diam, euismod eget porttitor vitae, posuere ac orci. Cras viverra tempus neque, ac blandit ligula.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'Sacred Snow'
	AND User.nick_name = 'Bambam'
	UNION
	SELECT '2', "Cras eget eros et felis rhoncus consectetur id eget dui. Praesent aliquet hendrerit mauris laoreet sodales. Mauris consequat, metus eget varius bibendum, lectus risus sodales eros, ut egestas mauris mi ac arcu. Vivamus in libero metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ut ultricies nisi. Quisque sed lorem mollis, sollicitudin sapien vitae, luctus diam. Praesent dictum sodales lacus ac tempor.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'Sacred Snow'
	AND User.nick_name = 'Oracle'
	UNION
	SELECT '4', "Integer sit amet velit vehicula, facilisis sapien eget, tristique nunc. Curabitur accumsan aliquet risus nec pretium. Mauris sit amet erat at lorem molestie porta ut feugiat velit. Cras semper augue vel mi ultrices, sit amet elementum mauris interdum. Proin at lacinia dolor. Donec pharetra congue est, non sagittis libero auctor et. Donec eu tempus leo. Aliquam quis lacus quis dui porttitor elementum quis sed diam.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'Sacred Snow'
	AND User.nick_name = 'Poncho'
	UNION
	SELECT '2', "Curabitur auctor, nisl in interdum feugiat, justo augue dignissim nulla, et fringilla odio risus non felis. Curabitur egestas interdum sagittis. Duis ac aliquet dui. Quisque consequat risus quis nisl eleifend, sit amet imperdiet sapien congue. Phasellus ut nisi a urna bibendum aliquam sit amet non libero. Proin commodo dui ut velit fermentum porttitor. Morbi placerat quis massa ac scelerisque. Maecenas tristique massa et fringilla egestas.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'The Stolen Butterfly'
	AND User.nick_name = 'Sandy'
	UNION
	SELECT '2', "Quisque quis tincidunt felis, vel lobortis odio. Fusce feugiat, mi eu varius laoreet, urna quam tempus nisi, sed sagittis urna enim sed mi. Pellentesque eu velit in diam consequat tristique. Maecenas varius porta metus in lacinia. In aliquet sem nibh, et faucibus ipsum congue nec. Curabitur dictum eget enim nec cursus. Fusce et eros vitae velit tincidunt luctus vitae sit amet augue. Sed dictum aliquam mollis.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = 'The Stolen Butterfly'
	AND User.nick_name = 'Gibby'
	UNION
	SELECT '3', "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam blandit lacus massa, nec gravida odio feugiat sed. Etiam ut libero ultrices, aliquet mi eget, consequat dolor. Suspendisse vitae elit risus. Morbi laoreet eleifend euismod. Morbi dapibus lorem eu velit blandit, eget elementum leo mattis. Sed nec dui consequat, aliquet dolor ac, consequat felis. Aliquam sodales vestibulum elit, nec porta massa lacinia eu.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = "The Dreams's Servant"
	AND User.nick_name = 'Oracle'
	UNION
	SELECT '4', "Fusce nec laoreet eros, vitae sagittis tortor. Vivamus eu placerat felis. Donec fringilla turpis sed mauris suscipit, at facilisis mauris mollis. Aliquam fringilla laoreet ex a cursus. Curabitur imperdiet eros sed lacus malesuada dapibus. Quisque congue justo interdum laoreet venenatis. Curabitur enim nibh, cursus non ante eget, imperdiet convallis neque. Vivamus maximus id lectus sit amet ultricies.", Book.id, User.id
	FROM Book, User
	WHERE Book.title = "The Dreams's Servant"
	AND User.nick_name = 'Cyclone';