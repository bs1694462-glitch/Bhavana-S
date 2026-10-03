export interface ShortFilm {
  id: string;
  title: string;
  localTitle?: string;
  posterUrl: string;
  backdropUrl?: string;
  language: string;
  rating: number;
  synopsis?: string;
  director: string;
  releaseYear: number;
  duration: string;
  isFeatured?: boolean;
  status: 'pending' | 'under_review' | 'approved' | 'rejected' | 'published';
  genre: string;
  viewsCount: number;
  likesCount: number;
  isLiked?: boolean;
}

export interface ReelVideo {
  id: string;
  url: string;
  creatorId: string;
  title: string;
  viewsCount: number;
}

export interface Creator {
  id: string;
  name: string;
  handle: string;
  avatar: string;
  bio: string;
  followersCount: number;
  followingCount?: number;
}

export interface User {
  id: string;
  name: string;
  email: string;
  role: 'USER' | 'ADMIN';
  avatar?: string;
  likedFilmIds?: string[];
  savedFilmIds?: string[];
}

export interface Review {
  id: string;
  filmId: string;
  userId: string;
  userName: string;
  userAvatar?: string;
  rating: number;
  headline: string;
  comment: string;
  helpfulCount: number;
  createdAt: string;
}

export interface Comment {
  id: string;
  userId: string;
  userName: string;
  userAvatar?: string;
  targetId: string;
  targetType: 'film' | 'creator';
  text: string;
  likesCount: number;
  createdAt: string;
}
