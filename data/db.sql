CREATE TABLE "user" (
  id SERIAL PRIMARY KEY,
  pseudo VARCHAR(55) UNIQUE NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  password VARCHAR(255),
  created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE "post" (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL references "user"(id),
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW(),
  img_url VARCHAR
);

CREATE TABLE "comment" (
  id SERIAL PRIMARY KEY,
  post_id INTEGER NOT NULL references "post"(id),
  user_id INTEGER NOT NULL references "user"(id),
  content TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT NOW()
);

CREATE TABLE "like" (
  id SERIAL PRIMARY KEY,
  user_id INTEGER NOT NULL references "user"(id),
  post_id INTEGER NOT NULL references "post"(id)
);

INSERT INTO "user" (email, pseudo, password)
VALUES ('picasso@artiste.fr','Picasso','jaimepeindre');
INSERT INTO "user" (email, pseudo, password)
VALUES ('ygc@gmail.com','Young Grumpy Cat','meow');
INSERT INTO "user" (email, pseudo, password)
VALUES ('jmchauvin@gmail.com','Jean Michel Chauvin','vivelafrance');
INSERT INTO "user" (email, pseudo, password)
VALUES ('otaku@expertise.fr','otaku-chan','jemesensseul');
INSERT INTO "user" (email, pseudo, password)
VALUES ('beldelphine@gmail.com','Bel Delphine','loveme');

INSERT INTO "post" (user_id, img_url, content) VALUES (1,'http://static1.squarespace.com/static/58faa30ee6f2e151cda11af0/58fba15486e6c0f3d27362ef/5d6bdabd35affe0001f69f7c/1567372842816/2019-inktober-prompt-list.png?format=1500w','Your bones dont break, mine do. Thats clear. Your cells react to bacteria and viruses differently than mine. You dont get sick, I do. Thats also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. Were on the same curve, just on opposite ends.');
INSERT INTO "post" (user_id, img_url, content) VALUES (2,'https://timedotcom.files.wordpress.com/2019/03/kitten-report.jpg','Your bones dont break, mine do. Thats clear. Your cells react to bacteria and viruses differently than mine. You dont get sick, I do. Thats also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. Were on the same curve, just on opposite ends.');
INSERT INTO "post" (user_id, img_url, content) VALUES (3,'https://images-na.ssl-images-amazon.com/images/I/21EAOCdUbKL._SX355_.jpg','Your bones dont break, mine do. Thats clear. Your cells react to bacteria and viruses differently than mine. You dont get sick, I do. Thats also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. Were on the same curve, just on opposite ends.');
INSERT INTO "post" (user_id, img_url, content) VALUES (4,'https://static.tvtropes.org/pmwiki/pub/images/otaku3.jpg','Your bones dont break, mine do. Thats clear. Your cells react to bacteria and viruses differently than mine. You dont get sick, I do. Thats also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. Were on the same curve, just on opposite ends.');
INSERT INTO "post" (user_id, img_url, content) VALUES (5,'https://cdn3-www.gamerevolution.com/assets/uploads/2019/10/belle-delphine.jpg','Your bones dont break, mine do. Thats clear. Your cells react to bacteria and viruses differently than mine. You dont get sick, I do. Thats also clear. But for some reason, you and I react the exact same way to water. We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected, you and I. Were on the same curve, just on opposite ends.');

INSERT INTO "comment" (user_id, post_id, content) VALUES (1,1, 'coucou je suis là');
INSERT INTO "comment" (user_id, post_id, content) VALUES (2,1, 'hey !!!');

INSERT INTO "like" (post_id, user_id) VALUES (1,1);
INSERT INTO "like" (post_id, user_id) VALUES (1,2);
INSERT INTO "like" (post_id, user_id) VALUES (1,4);
INSERT INTO "like" (post_id, user_id) VALUES (1,5);

INSERT INTO "like" (post_id, user_id) VALUES (2,2);
INSERT INTO "like" (post_id, user_id) VALUES (2,3);
INSERT INTO "like" (post_id, user_id) VALUES (2,4);






