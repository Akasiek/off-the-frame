export interface HomeLinks {
  first: string;
  last: string;
  next: string | null;
  prev: string | null;
}

export interface HomeMeta {
  current_page: number;
  from: number;
  last_page: number;
  per_page: number;
  path: string;
  to: number;
  total: number;
}
