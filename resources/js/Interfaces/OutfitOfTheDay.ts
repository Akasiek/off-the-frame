import { Product } from '@/Interfaces/Product';

export interface OutfitOfTheDay {
  id: number;
  name: string;
  image_source_url: string;
  image?: string;

  products: Product[];
}
