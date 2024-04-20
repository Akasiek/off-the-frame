import { ProductCategory } from '@/Interfaces/ProductCategory';
import { ProductLink } from '@/Interfaces/ProductLink';

export interface Product {
  id: number;
  brand: string;
  model: string;
  product_category_id: number;

  category: ProductCategory;
  links: ProductLink[];
  images: { url: string }[];
}
