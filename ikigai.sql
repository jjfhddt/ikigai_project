-- Création de la base de données (si elle n'existe pas déjà)
CREATE DATABASE IF NOT EXISTS ikigai;

-- Utilisation de la base de données
USE ikigai;

-- Suppression de la table si elle existe déjà (optionnel - à utiliser avec précaution)
-- DROP TABLE IF EXISTS ikigai_data;

-- Création de la table ikigai_data
CREATE TABLE IF NOT EXISTS ikigai_data (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tag1 VARCHAR(50) NOT NULL,
  tag2 VARCHAR(50) NOT NULL,
  tag3 VARCHAR(50) NOT NULL,
  confiance TEXT NOT NULL,
  valeurs_collegues TEXT NOT NULL,
  points_communs_differences TEXT NOT NULL,
  reputation TEXT NOT NULL,
  exemplaire_signification TEXT NOT NULL,
  exemplaire_devenir TEXT NOT NULL,
  exemplaire_apprentissage TEXT NOT NULL,
  valeurs_personnelles TEXT NOT NULL,
  valeurs_collegues_liste TEXT NOT NULL,
  reflexions TEXT NOT NULL,
  date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insertion de données d'exemple (optionnel - pour tester l'affichage)
INSERT INTO ikigai_data (
  tag1, tag2, tag3, 
  confiance, 
  valeurs_collegues, 
  points_communs_differences, 
  reputation, 
  exemplaire_signification, 
  exemplaire_devenir, 
  exemplaire_apprentissage, 
  valeurs_personnelles, 
  valeurs_collegues_liste, 
  reflexions
) VALUES (
  'Créatif', 'Fiable', 'Innovant',
  'Oui, je suis une personne de confiance car je respecte toujours mes engagements et je suis transparent dans mes communications.',
  'Organisé, Méthodique, Créatif, Fiable, Ponctuel, Rigoureux, Innovant, Collaboratif, Dynamique, Attentif, Respectueux',
  'Je constate que les mots "Créatif", "Fiable" et "Innovant" apparaissent à la fois dans ma liste et celle de mes collègues. Les différences concernent principalement les aspects organisationnels que mes collègues semblent davantage remarquer chez moi.',
  'Pour construire ma réputation autour de ces mots-clés, je dois continuer à proposer des solutions créatives, tenir mes promesses et développer constamment de nouvelles approches dans mon travail.',
  'Être exemplaire signifie incarner les valeurs que l\'on prône, servir de modèle aux autres et maintenir un haut niveau d\'exigence envers soi-même.',
  'Je peux devenir exemplaire en étant cohérent dans mes actions, en partageant mes connaissances avec les autres et en cherchant constamment à m\'améliorer.',
  'Je dois apprendre à mieux gérer mon temps, approfondir mes connaissances techniques et développer mes compétences en leadership.',
  'Intégrité, Créativité, Respect, Excellence, Collaboration',
  'Fiabilité, Innovation, Rigueur, Respect, Dynamisme',
  'Je constate que mes valeurs personnelles sont assez alignées avec la perception de mes collègues. Je dois cependant travailler davantage sur la rigueur et le dynamisme que mes collègues valorisent chez moi mais que je n\'ai pas identifiés comme valeurs clés.'
);
select*from ikigai_data ;