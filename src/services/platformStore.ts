import { ShortFilm, Creator, ReelVideo, Review, Comment, User } from '../types';
import { MOCK_FILMS, MOCK_CREATORS } from '../data/mockData';

const KEYS = {
  FILMS: 'ism_prod_v2_films',
  REELS: 'ism_prod_v2_reels',
  CREATORS: 'ism_prod_v2_creators',
  COMMENTS: 'ism_prod_v2_comments',
  REVIEWS: 'ism_prod_v2_reviews',
  SESSION: 'ism_prod_v2_session'
};

export class PlatformStore {
  // Authentication (Now bridged with Server API where possible)
  static getCurrentSession(): User | null {
    const data = localStorage.getItem(KEYS.SESSION);
    return data ? JSON.parse(data) : null;
  }

  static setCurrentSession(user: User | null) {
    if (user) localStorage.setItem(KEYS.SESSION, JSON.stringify(user));
    else localStorage.removeItem(KEYS.SESSION);
  }

  // Films
  static getFilms(): ShortFilm[] {
    const data = localStorage.getItem(KEYS.FILMS);
    if (data) return JSON.parse(data);
    this.saveFilms(MOCK_FILMS);
    return MOCK_FILMS;
  }

  static saveFilms(films: ShortFilm[]) {
    localStorage.setItem(KEYS.FILMS, JSON.stringify(films));
  }

  // Creators
  static getCreators(): Creator[] {
    const data = localStorage.getItem(KEYS.CREATORS);
    if (data) return JSON.parse(data);
    this.saveCreators(MOCK_CREATORS);
    return MOCK_CREATORS;
  }

  static saveCreators(creators: Creator[]) {
    localStorage.setItem(KEYS.CREATORS, JSON.stringify(creators));
  }

  // Reels
  static getReels(): ReelVideo[] {
    const data = localStorage.getItem(KEYS.REELS);
    return data ? JSON.parse(data) : [];
  }

  static saveReels(reels: ReelVideo[]) {
    localStorage.setItem(KEYS.REELS, JSON.stringify(reels));
  }

  // Reviews
  static getReviews(): Review[] {
    const data = localStorage.getItem(KEYS.REVIEWS);
    return data ? JSON.parse(data) : [];
  }

  static saveReviews(reviews: Review[]) {
    localStorage.setItem(KEYS.REVIEWS, JSON.stringify(reviews));
  }

  // Comments
  static getComments(): Comment[] {
    const data = localStorage.getItem(KEYS.COMMENTS);
    return data ? JSON.parse(data) : [];
  }

  static saveComments(comments: Comment[]) {
    localStorage.setItem(KEYS.COMMENTS, JSON.stringify(comments));
  }
}
